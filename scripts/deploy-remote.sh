#!/usr/bin/env bash

set -euo pipefail

APP_PATH="${APP_PATH:-/var/www/vanta-platform}"
APP_DOMAIN="${APP_DOMAIN:-vanta.aphezis.com}"
RELEASE_ARCHIVE="${RELEASE_ARCHIVE:?RELEASE_ARCHIVE is required}"
GITHUB_SHA="${GITHUB_SHA:-manual}"

RELEASE_ID="$(date -u +%Y%m%d%H%M%S)-${GITHUB_SHA:0:7}"
RELEASES_PATH="$APP_PATH/releases"
SHARED_PATH="$APP_PATH/shared"
CURRENT_PATH="$APP_PATH/current"
RELEASE_PATH="$RELEASES_PATH/$RELEASE_ID"

mkdir -p "$RELEASES_PATH" "$SHARED_PATH/storage" "$SHARED_PATH/bootstrap/cache" "$SHARED_PATH/database"
mkdir -p "$SHARED_PATH/storage/app/public" "$SHARED_PATH/storage/framework/cache" "$SHARED_PATH/storage/framework/sessions" "$SHARED_PATH/storage/framework/views" "$SHARED_PATH/storage/logs"

mkdir -p "$RELEASE_PATH"
tar -xzf "$RELEASE_ARCHIVE" -C "$RELEASE_PATH"
rm -f "$RELEASE_PATH/public/hot"
chmod -R u+rwX,go+rX "$RELEASE_PATH"

if [ ! -f "$SHARED_PATH/.env" ]; then
    cp "$RELEASE_PATH/.env.example" "$SHARED_PATH/.env"
    sed -i "s|^APP_NAME=.*|APP_NAME=Vanta|" "$SHARED_PATH/.env"
    sed -i "s|^APP_ENV=.*|APP_ENV=production|" "$SHARED_PATH/.env"
    sed -i "s|^APP_DEBUG=.*|APP_DEBUG=false|" "$SHARED_PATH/.env"
    sed -i "s|^APP_URL=.*|APP_URL=https://$APP_DOMAIN|" "$SHARED_PATH/.env"
    sed -i "s|^DB_CONNECTION=.*|DB_CONNECTION=sqlite|" "$SHARED_PATH/.env"
    sed -i "s|^# DB_DATABASE=.*|DB_DATABASE=$SHARED_PATH/database/database.sqlite|" "$SHARED_PATH/.env"
    sed -i "s|^DB_DATABASE=.*|DB_DATABASE=$SHARED_PATH/database/database.sqlite|" "$SHARED_PATH/.env"
    APP_KEY="$(php -r 'echo "base64:" . base64_encode(random_bytes(32));')"
    sed -i "s|^APP_KEY=.*|APP_KEY=$APP_KEY|" "$SHARED_PATH/.env"
fi

touch "$SHARED_PATH/database/database.sqlite"

rm -rf "$RELEASE_PATH/storage"
ln -s "$SHARED_PATH/storage" "$RELEASE_PATH/storage"
ln -sfn "$SHARED_PATH/.env" "$RELEASE_PATH/.env"

chmod -R ug+rwX "$SHARED_PATH/storage" "$SHARED_PATH/bootstrap/cache" "$RELEASE_PATH/bootstrap/cache"

if id www-data >/dev/null 2>&1; then
    chown -R www-data:www-data "$SHARED_PATH" "$RELEASE_PATH/bootstrap/cache"
fi

cd "$RELEASE_PATH"

php artisan migrate --force
php artisan optimize:clear
php artisan storage:link || true
php artisan config:cache
php artisan route:cache
php artisan view:cache

if [ -e "$CURRENT_PATH" ] && [ ! -L "$CURRENT_PATH" ]; then
    mv "$CURRENT_PATH" "$CURRENT_PATH.previous-$(date -u +%Y%m%d%H%M%S)"
fi

ln -sfn "$RELEASE_PATH" "$CURRENT_PATH.tmp"
mv -Tf "$CURRENT_PATH.tmp" "$CURRENT_PATH"

find "$RELEASES_PATH" -mindepth 1 -maxdepth 1 -type d | sort -r | tail -n +6 | xargs -r rm -rf
rm -f "$RELEASE_ARCHIVE"

echo "Deployed $RELEASE_ID to $CURRENT_PATH"
