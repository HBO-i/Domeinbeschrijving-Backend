#!/bin/bash
chmod -R 777 /var/www/html
chown -R www-data:www-data /var/www/html

# Ensure necessary NGINX directories exist and set permissions
mkdir -p /var/cache/nginx/client_temp
chown -R www-data:www-data /var/cache/nginx
chmod -R 777 /var/cache/nginx

php artisan migrate:fresh --seed
php artisan scribe:generate
php-fpm
