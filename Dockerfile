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
opcache.validate_timestamps=0\n\
realpath_cache_size=4096K\n\
realpath_cache_ttl=600\n\
' > /usr/local/etc/php/conf.d/opcache.ini

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Symfony Commands
RUN useradd -G www-data,root -u 1000 -d /home/symfony symfony
RUN mkdir -p /home/symfony/.composer && \
    chown -R symfony:symfony /home/symfony

# Set working directory
WORKDIR /var/www

# Copy existing application directory
COPY . /var/www

# Set permissions
RUN chown -R symfony:symfony /var/www

# Switch to non-root user
USER symfony

# Install dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Switch back to root for FPM
USER root

EXPOSE 9000
CMD ["php-fpm"]