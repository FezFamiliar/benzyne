FROM php:7.3-apache

WORKDIR /var/www/html/benzyne

COPY . .

EXPOSE 80   