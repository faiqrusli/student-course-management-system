FROM php:8.2-apache

# ----------------------------
# System dependencies
# ----------------------------
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    default-mysql-client \
 && docker-php-ext-install pdo_mysql zip gd mbstring xml \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/*

# ----------------------------
# Install Node.js (for Vite)
# ----------------------------
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
 && apt-get install -y nodejs

# ----------------------------
# Enable Apache modules
# ----------------------------
RUN a2enmod rewrite

# ----------------------------
# Cloud Run port
# ----------------------------
ENV PORT=8080
RUN sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf \
 && sed -i "s/:80/:${PORT}/g" /etc/apache2/sites-available/000-default.conf

# ----------------------------
# Set Apache document root
# ----------------------------
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

# ----------------------------
# Working directory
# ----------------------------
WORKDIR /var/www/html

# ----------------------------
# Copy application
# ----------------------------
COPY . .

# ----------------------------
# Install JS deps & build assets (THIS FIXES VITE)
# ----------------------------
RUN npm install \
 && npm run build

# ----------------------------
# Install Composer
# ----------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ----------------------------
# Install PHP dependencies
# ----------------------------
RUN composer install --no-dev --optimize-autoloader

# ----------------------------
# Create required Laravel dirs
# ----------------------------
RUN mkdir -p \
    storage/framework/views \
    storage/framework/cache \
    storage/framework/sessions \
    storage/logs \
    bootstrap/cache

# ----------------------------
# Permissions (Cloud Run)
# ----------------------------
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 777 storage bootstrap/cache

# ----------------------------
# Clear Laravel caches
# ----------------------------
RUN php artisan config:clear \
 && php artisan route:clear \
 && php artisan view:clear || true

# ----------------------------
# Apache access rules
# ----------------------------
RUN echo '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# ----------------------------
# Expose port
# ----------------------------
EXPOSE 8080

# ----------------------------
# Start Apache
# ----------------------------
CMD ["apache2-foreground"]
