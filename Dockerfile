FROM php:7.4-fpm-alpine

RUN apt-get update && apt-get install -y \
&& docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod rewrite

RUN chmod 777 -R -c /var/www/
