#!/usr/bin/env bash
apt-get update
apt-get install -y php-sqlite3
composer install --no-dev --optimize-autoloader
