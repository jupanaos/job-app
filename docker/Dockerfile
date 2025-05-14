FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git unzip zip libpq-dev libonig-dev libxml2-dev libzip-dev \
    mariadb-client \
    && docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /app

COPY . .

RUN composer install --no-interaction --prefer-dist

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]