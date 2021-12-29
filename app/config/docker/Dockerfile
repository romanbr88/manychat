FROM php:7.4-fpm-alpine

RUN apk update && apk add curl wget git postgresql-dev
RUN docker-php-ext-install -j$(nproc) mysqli pdo pdo_mysql pdo_pgsql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/manychat

CMD ["php-fpm"]