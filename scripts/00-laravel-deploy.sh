#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

php artisan key:generate --show

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

sudo chown :www-data app storage bootstrap -R
sudo chmod 775 app storage bootstrap -R

# echo "Running migrations..."
# php artisan migrate --force