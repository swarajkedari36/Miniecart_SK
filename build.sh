#!/usr/bin/env bash

# Install PHP SQLite extension
apt-get update
apt-get install -y php-sqlite3

# Laravel dependencies
composer install --no-dev --optimize-autoloader

# Laravel app setup
php artisan config:clear
php artisan config:cache
php artisan migrate --force || true
