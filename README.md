# AI / CPaaS / Automation Corporate Website

Premium dark-theme technology company site.

**Stack:** HTML5 · CSS3 · Vanilla JavaScript · PHP 8+ · Font Awesome  
**No Node.js / React / npm build required.**

---

## Quick start (XAMPP / LAMP)

1. Copy this folder into your web root  
   - XAMPP: `htdocs/your-site/`  
   - LAMP: `/var/www/html/your-site/`
2. Open `http://localhost/your-site/`
3. Or from this directory:

```bash
php -S localhost:8080
```

## Docker

```bash
docker compose up --build
```

Open http://localhost:8080

---

## Configure company details

Edit **one file**: `includes/config.php`

```php
define('COMPANY_NAME', 'Dataa');
define('COMPANY_EMAIL', 'connect@dataa.in');
define('COMPANY_PHONE', '+91 77913 25111');
define('COMPANY_ADDRESS', 'Hyderabad, Rajendranagar, Telangana, India');
define('COMPANY_WEBSITE', 'dataa.in');
define('SITE_URL', 'https://dataa.in');
```

Optional social URLs (`SOCIAL_LINKEDIN`, etc.) — leave empty to hide footer icons.

---

## Contact form

- UI: `includes/contact-form.php`
- Processing: `contact.php` (CSRF, honeypot, validation, `mail()`, XSS-safe output)
- Enquiries may append to `storage/enquiries.log` when writable
- To enable email: set a real `COMPANY_EMAIL` / `CONTACT_TO_EMAIL`
- Later: replace `mail()` with SMTP (PHPMailer etc.) inside `contact.php` only

---

## Where to change content

| What | Where |
|------|--------|
| Company name / email / phone | `includes/config.php` |
| Colors / theme | `assets/css/style.css` (`:root` variables) |
| Logo text | Navbar uses `COMPANY_NAME`; mark styled in CSS `.brand-mark` |
| Product copy | `products.php`, `ai-voice-agent.php`, `ai-chatbot.php`, `video-analytics.php`, home sections in `index.php` |
| Case studies | Home `#case-studies` section (marked as placeholders) |
| Navigation | `includes/navbar.php` / `includes/footer.php` |

---

## Pages

| Page | File |
|------|------|
| Home | `index.php` |
| Products | `products.php` |
| AI Voice Agent | `ai-voice-agent.php` |
| AI Chatbot | `ai-chatbot.php` |
| Video Analytics | `video-analytics.php` |
| Solutions | `solutions.php` |
| Industries | `industries.php` |
| About | `about.php` |
| Contact | `contact.php` |
| Privacy | `privacy-policy.php` |
| Terms | `terms.php` |

---

## Deploy to Apache / cPanel

1. Upload all files to `public_html` (or your document root)
2. Ensure PHP 8+ is enabled
3. Make `storage/` writable if you want enquiry logging (`chmod 775`)
4. Set real values in `includes/config.php`
5. Update `sitemap.xml` / `robots.txt` domain
6. Enable HTTPS on the host

No build step. No npm.

## Deploy to the Hostinger VPS (dataa.in)

The domain already points at the Hostinger VPS `srv2004801.hstgr.cloud`. Nginx serves HTTPS for `dataa.in`. These paths stay on their current handlers:

- `https://dataa.in/services/` (and everything under it, including `/services/health`)
- `https://dataa.in/workflows/` (and everything under it)

The installer only replaces the main site (`/`, `/contact.php`, `/assets/…`). It edits the existing nginx server in place, refuses to continue if the `/services` location is missing, and rolls back if those URLs change.

On the VPS, open **hPanel → VPS → Terminal** as root and run:

```bash
curl -fsSL https://raw.githubusercontent.com/psudhirreddy369/dataa.in/cursor/deploy-hostinger-vps-1903/deploy/install-on-vps.sh -o /root/install-on-vps.sh
bash /root/install-on-vps.sh
```

PHP files are published to `/var/www/dataa.in`. The previous nginx file is copied to `/root/dataa-deploy-backup-*`.
