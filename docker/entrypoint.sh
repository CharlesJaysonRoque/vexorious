#!/bin/sh
set -e

# Ensure SQLite file exists if using sqlite
if [ "$DB_CONNECTION" = "sqlite" ]; then
    DB_FILE="${DB_DATABASE:-/var/www/html/storage/database/database.sqlite}"
    DB_DIR=$(dirname "$DB_FILE")
    mkdir -p "$DB_DIR"
    if [ ! -f "$DB_FILE" ]; then
        touch "$DB_FILE"
    fi
    chown -R www-data:www-data "$DB_DIR"
fi

# Ensure storage directories have correct permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Run Laravel optimizations
php artisan migrate --force || true
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM in background and Nginx in foreground
php-fpm -D
exec nginx -g "daemon off;"
