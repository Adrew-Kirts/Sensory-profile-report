# Use PHP 8.2 FPM image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    libicu-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl opcache

# Configure OPcache
RUN echo '\
opcache.enable=1\n\
opcache.enable_cli=1\n\
opcache.memory_consumption=256\n\
opcache.max_accelerated_files=20000\n\
opcache.validate_timestamps=1\n\
realpath_cache_size=4096K\n\
realpath_cache_ttl=600\n\
' > /usr/local/etc/php/conf.d/opcache.ini

# Configure PHP-FPM to keep environment variables
RUN echo '\
[www]\n\
clear_env = no\n\
' > /usr/local/etc/php-fpm.d/env.conf

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory
COPY . /var/www

# Install dependencies
RUN composer install --no-interaction --optimize-autoloader

# Set permissions for storage
RUN chown -R www-data:www-data /var/www/var

EXPOSE 9000
CMD ["php-fpm"]