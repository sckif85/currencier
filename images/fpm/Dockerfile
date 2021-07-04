FROM php:7.4.19-fpm-alpine

RUN apk update && apk add \
        $PHPIZE_DEPS \
        postgresql-dev \
    && docker-php-ext-install -j$(nproc) pgsql pdo pdo_pgsql opcache