#!/usr/bin/env bash
# Install the Dataa site on the Hostinger VPS that already serves dataa.in.
# Run as root in the Hostinger browser terminal (hPanel → VPS → Terminal).
# Keeps the existing Let's Encrypt certificate and backs up the current nginx site.
set -euo pipefail

if [[ "${EUID}" -ne 0 ]]; then
  echo "Run this as root on the VPS."
  exit 1
fi

REPO_URL="https://github.com/psudhirreddy369/dataa.in.git"
SITE_ROOT="/var/www/dataa.in"
NGINX_SITE="/etc/nginx/sites-available/dataa.in"
STAMP="$(date +%Y%m%d%H%M%S)"
BACKUP_DIR="/root/dataa-deploy-backup-${STAMP}"

export DEBIAN_FRONTEND=noninteractive

echo "Installing PHP and nginx..."
apt-get update
apt-get install -y nginx php-fpm php-cli php-mbstring git curl ca-certificates

PHP_SOCK="$(find /run/php -name 'php*-fpm.sock' | sort | tail -n 1 || true)"
if [[ -z "${PHP_SOCK}" ]]; then
  echo "PHP-FPM socket was not created. Check: systemctl status 'php*-fpm'"
  exit 1
fi

if ! nginx -t >/dev/null 2>&1; then
  echo "nginx -t failed before changes. Fix nginx, then re-run."
  exit 1
fi

mkdir -p "${BACKUP_DIR}"
nginx -T > "${BACKUP_DIR}/nginx-T-before.txt" 2>/dev/null || true

# Pull ssl_certificate paths from the server block that already answers for dataa.in.
# Track the server-block depth so a nested location "}" does not end the search.
CERT=""
KEY=""
mapfile -t CERT_LINES < <(awk '
  BEGIN { depth = 0; mark = -1; site = 0; cert = ""; key = "" }
  {
    raw = $0
    tmp = raw
    nopen = gsub(/\{/, "{", tmp)
    nclose = gsub(/\}/, "}", tmp)

    if (raw ~ /^[[:space:]]*server[[:space:]]*\{/ && nopen > 0) {
      mark = depth + 1
      site = 0
      cert = ""
      key = ""
    }

    if (mark > 0) {
      if (raw ~ /server_name/ && raw ~ /(^|[^A-Za-z0-9-])dataa\.in([^A-Za-z0-9.-]|$)/) {
        site = 1
      }
      if (site && raw ~ /ssl_certificate_key[[:space:]]/) {
        key = $2
        gsub(/;/, "", key)
      } else if (site && raw ~ /^[[:space:]]*ssl_certificate[[:space:]]/) {
        cert = $2
        gsub(/;/, "", cert)
      }
    }

    depth += nopen - nclose
    if (depth < 0) depth = 0

    if (mark > 0 && depth < mark) {
      if (site && cert != "" && key != "") {
        print cert
        print key
        exit
      }
      mark = -1
      site = 0
    }
  }
' "${BACKUP_DIR}/nginx-T-before.txt")
CERT="${CERT_LINES[0]:-}"
KEY="${CERT_LINES[1]:-}"

if [[ -z "${CERT}" || -z "${KEY}" || ! -f "${CERT}" || ! -f "${KEY}" ]]; then
  echo "Could not find the existing dataa.in TLS certificate in nginx -T."
  echo "Saved the current config at ${BACKUP_DIR}/nginx-T-before.txt"
  exit 1
fi

echo "Using certificate ${CERT}"

if [[ -d "${SITE_ROOT}/.git" ]]; then
  git -C "${SITE_ROOT}" fetch --depth 1 origin main
  git -C "${SITE_ROOT}" checkout -f main
  git -C "${SITE_ROOT}" reset --hard origin/main
else
  if [[ -d "${SITE_ROOT}" ]]; then
    mv "${SITE_ROOT}" "${BACKUP_DIR}/www-dataa.in"
  fi
  git clone --depth 1 --branch main "${REPO_URL}" "${SITE_ROOT}"
fi

find "${SITE_ROOT}" -type d -exec chmod 755 {} \;
find "${SITE_ROOT}" -type f -exec chmod 644 {} \;
mkdir -p "${SITE_ROOT}/storage"
chown -R www-data:www-data "${SITE_ROOT}/storage"
chmod 775 "${SITE_ROOT}/storage"

declare -a DISABLED=()
disable_conf() {
  local conf="$1"
  [[ -f "${conf}" ]] || return 0
  if [[ "${conf}" == "${NGINX_SITE}" || "${conf}" == "/etc/nginx/sites-enabled/dataa.in" ]]; then
    return 0
  fi
  if grep -q "Managed by deploy/install-on-vps.sh" "${conf}" 2>/dev/null; then
    return 0
  fi
  if grep -qE 'server_name[[:space:]].*dataa\.in' "${conf}" 2>/dev/null; then
    local saved="${BACKUP_DIR}/disabled-$(echo "${conf}" | tr '/' '_')"
    mv "${conf}" "${saved}"
    DISABLED+=("${conf}|${saved}")
    echo "Disabled previous site config ${conf}"
  fi
}

while IFS= read -r conf; do
  disable_conf "${conf}"
done < <(find /etc/nginx/sites-enabled /etc/nginx/sites-available /etc/nginx/conf.d -type f 2>/dev/null || true)

mkdir -p /etc/nginx/sites-available /etc/nginx/sites-enabled

cat > "${NGINX_SITE}" <<EOF
# Managed by deploy/install-on-vps.sh
server {
    listen 80;
    listen [::]:80;
    server_name dataa.in www.dataa.in;
    return 301 https://dataa.in\$request_uri;
}

server {
    listen 443 ssl;
    listen [::]:443 ssl;
    http2 on;
    server_name www.dataa.in;

    ssl_certificate ${CERT};
    ssl_certificate_key ${KEY};

    return 301 https://dataa.in\$request_uri;
}

server {
    listen 443 ssl;
    listen [::]:443 ssl;
    http2 on;
    server_name dataa.in;

    root ${SITE_ROOT};
    index index.php;

    ssl_certificate ${CERT};
    ssl_certificate_key ${KEY};

    client_max_body_size 8m;

    add_header X-Content-Type-Options nosniff always;
    add_header X-Frame-Options SAMEORIGIN always;
    add_header Referrer-Policy strict-origin-when-cross-origin always;

    location ^~ /storage/ {
        deny all;
    }

    location ~ /\\. {
        deny all;
    }

    location / {
        try_files \$uri \$uri/ =404;
    }

    location ~ \\.php\$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:${PHP_SOCK};
    }

    location ~* \\.(css|js|svg|png|jpg|jpeg|gif|ico|webp)\$ {
        expires 7d;
        add_header Cache-Control "public";
        try_files \$uri =404;
    }
}
EOF

ln -sfn "${NGINX_SITE}" /etc/nginx/sites-enabled/dataa.in

if ! grep -Rqs 'sites-enabled' /etc/nginx/nginx.conf /etc/nginx/conf.d 2>/dev/null; then
  cp "${NGINX_SITE}" /etc/nginx/conf.d/dataa.in.conf
fi

restore_disabled() {
  local entry conf saved
  for entry in "${DISABLED[@]}"; do
    conf="${entry%%|*}"
    saved="${entry#*|}"
    if [[ -f "${saved}" ]]; then
      mkdir -p "$(dirname "${conf}")"
      mv "${saved}" "${conf}"
    fi
  done
  rm -f /etc/nginx/sites-enabled/dataa.in /etc/nginx/conf.d/dataa.in.conf
}

if nginx -t; then
  systemctl reload nginx
  systemctl enable php*-fpm >/dev/null 2>&1 || true
  systemctl restart php*-fpm
else
  echo "nginx -t failed. Restoring the previous site config from ${BACKUP_DIR}"
  restore_disabled
  nginx -t && systemctl reload nginx || true
  exit 1
fi

echo "Deployed ${SITE_ROOT}"
echo "Open https://dataa.in/ — backup of the previous config is ${BACKUP_DIR}"
