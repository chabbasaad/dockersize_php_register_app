FROM php:8.1-apache

# Copy application code
COPY src/ /var/www/html/

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql