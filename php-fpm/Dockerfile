FROM php:7.4-fpm

RUN apt-get update && \
    apt-get install -yq tzdata && \
    ln -fs /usr/share/zoneinfo/Asia/Baku /etc/localtime && \
    dpkg-reconfigure -f noninteractive tzdata

RUN apt-get update && apt-get install -y zlib1g-dev libpng-dev g++ git libicu-dev zip libzip-dev zip libpq-dev \
    && docker-php-ext-install zip intl opcache pdo pdo_mysql gd sockets bcmath \
    && pecl install apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-enable apcu

WORKDIR /var/www

COPY ../www /var/www/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#RUN curl -sS https://get.symfony.com/cli/installer | bash
#RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony
