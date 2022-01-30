FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
zlib1g-dev \
libzip-dev \
libpq-dev \
unzip \
&& echo 'alias sf="php bin/console"' >> ~/.bashrc

RUN docker-php-ext-install \
pdo pdo_mysql mysqli zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/app

EXPOSE 9000