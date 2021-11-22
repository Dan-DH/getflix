FROM php:7.3-apache

## Copy source code
COPY ./source /var/www/html

## Install git and unzip
RUN apt-get update && apt-get install -y --no-install-recommends git unzip && \
    rm -rf /var/lib/apt/lists/*

## Install composer
RUN curl --silent --show-error https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

## Enable PHP and Apache modules
RUN docker-php-ext-install pdo pdo_mysql mysqli gettext
RUN a2enmod rewrite headers ssl
