#!/usr/bin/env bash
# Publish the Dataa PHP site on the existing Hostinger nginx vhost.
# /services and /workflows/ stay on their current handlers.
# Run as root in the Hostinger browser terminal (hPanel → VPS → Terminal).
set -euo pipefail

if [[ "${EUID}" -ne 0 ]]; then
  echo "Run this as root on the VPS."
  exit 1
fi

REPO_URL="https://github.com/psudhirreddy369/dataa.in.git"
RAW_BASE="${RAW_BASE:-https://raw.githubusercontent.com/psudhirreddy369/dataa.in/cursor/deploy-hostinger-vps-1903/deploy}"
SITE_ROOT="/var/www/dataa.in"
PRESERVED_ROOT="/var/www/dataa-preserved"
STAMP="$(date +%Y%m%d%H%M%S)"
BACKUP_DIR="/root/dataa-deploy-backup-${STAMP}"

export DEBIAN_FRONTEND=noninteractive

echo "Installing PHP, nginx, and git..."
apt-get update
apt-get install -y nginx php-fpm php-cli php-mbstring git curl ca-certificates python3

PHP_SOCK="$(find /run/php -name 'php*-fpm.sock' | sort | tail -n 1 || true)"
if [[ -z "${PHP_SOCK}" ]]; then
  systemctl enable --now php*-fpm >/dev/null 2>&1 || true
  PHP_SOCK="$(find /run/php -name 'php*-fpm.sock' | sort | tail -n 1 || true)"
fi
if [[ -z "${PHP_SOCK}" ]]; then
  echo "PHP-FPM socket was not created."
  exit 1
fi

if ! nginx -t >/dev/null 2>&1; then
  echo "nginx -t failed before changes. Fix nginx, then re-run."
  exit 1
fi

mkdir -p "${BACKUP_DIR}"
nginx -T > "${BACKUP_DIR}/nginx-T-before.txt" 2>/dev/null || true

mapfile -t CANDIDATES < <(grep -RIl 'dataa\.in' /etc/nginx/sites-enabled /etc/nginx/sites-available /etc/nginx/conf.d 2>/dev/null || true)
if [[ "${#CANDIDATES[@]}" -eq 0 ]]; then
  echo "Could not find an nginx file that mentions dataa.in."
  exit 1
fi

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PATCHER="${SCRIPT_DIR}/patch_nginx_site.py"
if [[ ! -f "${PATCHER}" ]]; then
  PATCHER="${BACKUP_DIR}/patch_nginx_site.py"
  curl -fsSL "${RAW_BASE}/patch_nginx_site.py" -o "${PATCHER}"
fi

declare -A SEEN=()
TARGETS=()
for conf in "${CANDIDATES[@]}"; do
  [[ -f "${conf}" ]] || continue
  real="$(readlink -f "${conf}")"
  if [[ -n "${SEEN[${real}]:-}" ]]; then
    continue
  fi
  SEEN["${real}"]=1
  if python3 "${PATCHER}" --config "${real}" --show-root >/dev/null 2>&1; then
    TARGETS+=("${real}")
  fi
done

if [[ "${#TARGETS[@]}" -eq 0 ]]; then
  echo "dataa.in is in nginx, but no server block has a /services location. Nothing was changed."
  exit 1
fi

OLD_ROOT="$(python3 "${PATCHER}" --config "${TARGETS[0]}" --show-root)"
echo "Patching: ${TARGETS[*]}"
echo "Current web root: ${OLD_ROOT}"

declare -A BACKUP_OF=()
for conf in "${TARGETS[@]}"; do
  saved="${BACKUP_DIR}/$(echo "${conf}" | tr '/' '_')"
  cp -a "${conf}" "${saved}"
  BACKUP_OF["${conf}"]="${saved}"
done

mkdir -p "${PRESERVED_ROOT}"
if [[ -f "${OLD_ROOT}/index.html" ]]; then
  cp -a "${OLD_ROOT}/index.html" "${PRESERVED_ROOT}/index.html"
else
  printf '%s\n' '<!DOCTYPE html><html><head><title>My Website</title></head><body><h1>Website is working</h1></body></html>' > "${PRESERVED_ROOT}/index.html"
fi

if [[ -d "${SITE_ROOT}/.git" ]]; then
  git -C "${SITE_ROOT}" fetch --depth 1 origin main
  git -C "${SITE_ROOT}" checkout -f main
  git -C "${SITE_ROOT}" reset --hard origin/main
else
  rm -rf "${SITE_ROOT}"
  git clone --depth 1 --branch main "${REPO_URL}" "${SITE_ROOT}"
fi

find "${SITE_ROOT}" -type d -exec chmod 755 {} \;
find "${SITE_ROOT}" -type f -exec chmod 644 {} \;
mkdir -p "${SITE_ROOT}/storage"
chown -R www-data:www-data "${SITE_ROOT}/storage"
chmod 775 "${SITE_ROOT}/storage"

for conf in "${TARGETS[@]}"; do
  python3 "${PATCHER}" \
    --config "${conf}" \
    --site-root "${SITE_ROOT}" \
    --php-sock "${PHP_SOCK}" \
    --previous-root "${PRESERVED_ROOT}" \
    > "${conf}.new"
  mv "${conf}.new" "${conf}"
done

restore_nginx() {
  echo "Restoring the previous nginx site config."
  for conf in "${TARGETS[@]}"; do
    cp -a "${BACKUP_OF[${conf}]}" "${conf}"
  done
  nginx -t && systemctl reload nginx || true
}

if ! nginx -t; then
  restore_nginx
  exit 1
fi

fetch_local() {
  local path="$1" body="$2" codefile="$3"
  local code
  code="$(curl -sS --resolve dataa.in:443:127.0.0.1 --max-time 15 \
    -o "${body}" -w "%{http_code}" "https://dataa.in${path}" || true)"
  if [[ -z "${code}" ]]; then
    code="curl-failed"
  fi
  printf '%s' "${code}" > "${codefile}"
}

# Running workers still have the old config until reload.
mkdir -p "${BACKUP_DIR}/before" "${BACKUP_DIR}/after"
declare -a WATCH_PATHS=("/services/health" "/services/" "/workflows/" "/workflows")
for path in "${WATCH_PATHS[@]}"; do
  key="$(echo "${path}" | tr '/' '_')"
  fetch_local "${path}" "${BACKUP_DIR}/before/${key}.body" "${BACKUP_DIR}/before/${key}.code"
done

systemctl enable php*-fpm >/dev/null 2>&1 || true
systemctl restart php*-fpm
systemctl reload nginx

changed=0
for path in "${WATCH_PATHS[@]}"; do
  key="$(echo "${path}" | tr '/' '_')"
  fetch_local "${path}" "${BACKUP_DIR}/after/${key}.body" "${BACKUP_DIR}/after/${key}.code"
  before_code="$(tr -d '[:space:]' < "${BACKUP_DIR}/before/${key}.code")"
  after_code="$(tr -d '[:space:]' < "${BACKUP_DIR}/after/${key}.code")"
  if [[ "${before_code}" == "curl-failed" || -z "${before_code}" ]]; then
    echo "Could not snapshot ${path} before reload; skipped that comparison."
    continue
  fi
  if [[ "${before_code}" != "${after_code}" ]] || ! cmp -s "${BACKUP_DIR}/before/${key}.body" "${BACKUP_DIR}/after/${key}.body"; then
    echo "Endpoint changed after deploy: https://dataa.in${path} (${before_code} -> ${after_code})"
    changed=1
  else
    echo "Unchanged: https://dataa.in${path}"
  fi
done

fetch_local "/" "${BACKUP_DIR}/after/home.body" "${BACKUP_DIR}/after/home.code"
home_code="$(cat "${BACKUP_DIR}/after/home.code")"
if ! grep -q "Build Smarter. Automate Conversations." "${BACKUP_DIR}/after/home.body"; then
  echo "The homepage did not come from this PHP site."
  changed=1
fi

if [[ "${changed}" -ne 0 ]]; then
  restore_nginx
  exit 1
fi

echo "Deployed ${SITE_ROOT}"
echo "Homepage HTTP ${home_code}. Existing /services and /workflows responses were unchanged."
echo "Backup: ${BACKUP_DIR}"
