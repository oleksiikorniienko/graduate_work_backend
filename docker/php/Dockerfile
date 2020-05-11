FROM php:7.4-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    sudo \
    build-essential \
    mariadb-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    supervisor \
    libc-client-dev \
    libkrb5-dev \
    libzip-dev \
    libicu-dev \
    libpq-dev \
    yarn \
    libxml2-dev \
    openssl \
    libssl-dev \
    pkg-config \
    wget

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install \
    pgsql \
    pdo \
    pdo_pgsql \
    bcmath \
    zip \
    intl \
    sockets \
    ctype \
    iconv \
    json \
    session \
    simplexml \
    tokenizer

# Install xdebug
#RUN pecl install xdebug && docker-php-ext-enable xdebug
#ENV XDEBUGINI_PATH=/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
#COPY ./php/xdebug.ini /tmp/xdebug.ini
#RUN cat /tmp/xdebug.ini >> $XDEBUGINI_PATH

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ARG username
ARG useruid

# Add user for laravel application
RUN groupadd -g $useruid $username
RUN useradd -u $useruid -ms /bin/bash -g $username $username

# Copy existing application directory permissions
RUN chown $username:$username . /var/www

# Change current user to www
USER $username

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
