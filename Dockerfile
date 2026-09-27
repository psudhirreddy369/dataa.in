# Dataa corporate website
# PHP + Apache (supports .htaccess)

FROM php:8.2-apache-bookworm

# Enable Apache modules used by .htaccess + curl for healthchecks
RUN apt-get update \
    && apt-get install -y --no-install-recommends curl \
    && rm -rf /var/lib/apt/lists/* \
    && a2enmod rewrite headers expires \
    && sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# JSON is built-in; no extra PHP extensions required for this site.
# Add extensions here later if you wire SMTP/MySQL.

# Document root
WORKDIR /var/www/html

# Copy application
COPY . /var/www/html

# Ensure enquiry log directory is writable by Apache
RUN mkdir -p /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 775 /var/www/html/storage

# Drop sensitive / unnecessary files from the image if present
RUN rm -f /var/www/html/.gitkeep 2>/dev/null || true

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=10s --retries=3 \
  CMD curl -fsS http://127.0.0.1/ >/dev/null || exit 1

CMD ["apache2-foreground"]
