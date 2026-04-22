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

exec "$@"