#!/bin/bash

php artisan config:cache
php artisan migrate --force
php artisan serve --host=0.0.0.0 --port=8080
