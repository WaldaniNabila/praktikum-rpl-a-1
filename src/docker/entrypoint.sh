#!/bin/sh

set -e

cd /var/www

if [ ! -f .env ]; then
    cp .env.example .env
fi

if ! grep -q '^APP_KEY=base64:' .env; then
    php artisan key:generate --force --no-interaction
fi

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Buat symlink storage agar file yang diupload bisa diakses via browser
php artisan storage:link --force 2>/dev/null || true

exec "$@"