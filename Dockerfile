FROM php:8.2-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Install required system dependencies
RUN apt-get update && apt-get install -y \
    zip unzip curl libzip-dev libonig-dev libxml2-dev sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set Apache DocumentRoot and allow .htaccess overrides
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf && \
    echo '<Directory /var/www/html/public>\nAllowOverride All\n</Directory>' >> /etc/apache2/apache2.conf

# Copy project files
COPY . /var/www/html

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader || true

# Set permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Laravel cache & config
RUN if [ -f ".env" ] && [ -d "vendor" ]; then \
      php artisan config:clear && \
      php artisan config:cache && \
      php artisan route:cache && \
      php artisan view:cache; \
    else \
      echo "Skipping artisan because .env or vendor folder is missing"; \
    fi

EXPOSE 80
