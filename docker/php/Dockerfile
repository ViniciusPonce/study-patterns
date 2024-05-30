FROM php:8.2.0-fpm-alpine

WORKDIR '/var/www'

USER root

RUN apk update && \
    apk add --no-cache util-linux \
    bash \
    git \
    curl \
    vim \
    yarn

RUN apk add --update linux-headers \
    && apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN echo "memory_limit=512M" > $PHP_INI_DIR/conf.d/memory_limit.ini
RUN apk update && apk add unzip

RUN docker-php-ext-install \
    mysqli \
    pdo \
    pdo_mysql \
    bcmath

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --2 && \
    echo "export PATH=${PATH}:/var/www/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer

RUN . ~/.bashrc

RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog \
    rm -rf /var/cache/apk/*

CMD ["php-fpm"]