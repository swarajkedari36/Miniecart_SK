#!/bin/bash

# Run artisan setup commands
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan migrate --force || true

# Start apache
apache2-foreground
