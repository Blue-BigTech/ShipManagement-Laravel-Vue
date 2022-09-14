FROM php:7.4-fpm

COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

COPY --from=node:10.22 /usr/local/bin /usr/local/bin
COPY --from=node:10.22 /usr/local/lib /usr/local/lib

RUN apt-get update \
&& apt-get install -y \
    gcc \
    make \
    libpng-dev \
    git \
    unzip \
    vim \
    libmcrypt-dev \
    curl \
    gnupg \
    libjpeg-dev \
    libfreetype6-dev \
    libxi6 \
    && docker-php-ext-install pdo_mysql bcmath \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN apt-get -y install libzip-dev

RUN apt-get install -y zlib1g-dev \
    && docker-php-ext-install zip

RUN docker-php-ext-install zip

RUN echo "file_uploads = On\n" \
         "memory_limit = -1\n" \
         "upload_max_filesize = 500M\n" \
         "post_max_size = 500M\n" \
         "max_execution_time = 600\n" \
         > /usr/local/etc/php/conf.d/docker-php-ext-uploads.ini

RUN apt-get -y install r-base-core

WORKDIR /var/www/yugyosen
