FROM php:7.4.9-fpm

COPY php.ini /usr/local/etc/php/

# Laravelに必要なパッケージをインストール
RUN apt update \
    && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
    && docker-php-ext-install pdo_mysql zip

# Composerをインストール
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update

# Node.jsをインストール
RUN apt-get install -y nodejs npm \
    && npm install n -g \
    && n 16.15.1

WORKDIR /var/www