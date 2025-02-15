FROM php:8.4-fpm-alpine3.20

RUN apk update && apk add --no-cache \
    bash \
    curl \
    zip \
    unzip \
    git \
    oniguruma-dev \
    libxml2-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring xml

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY php.ini /usr/local/etc/php
WORKDIR /home/web/mecipi/laravel