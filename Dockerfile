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
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

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