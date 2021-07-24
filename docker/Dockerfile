FROM php

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt update && apt -y install \
    libicu-dev \
    git \
    libzip-dev

RUN docker-php-ext-install intl zip

RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY php.ini /usr/local/etc/php/php.ini

WORKDIR /app

EXPOSE 9003