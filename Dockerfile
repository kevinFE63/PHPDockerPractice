# Use the official PHP image with Apache
FROM php:apache

# Install the PDO and PDO MySQL extensions
RUN docker-php-ext-install pdo pdo_mysql
