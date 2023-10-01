FROM php:8.2-fpm-buster

RUN pecl install xdebug-3.2.1 && \
    docker-php-ext-enable xdebug

RUN   echo "" >> /usr/local/etc/php/php.ini-development && \
      echo "[xdebug]" >> /usr/local/etc/php/php.ini-development && \
      echo "xdebug.mode=debug" >> /usr/local/etc/php/php.ini-development && \
      echo "xdebug.client_host=172.17.0.1" >> /usr/local/etc/php/php.ini-development && \
      echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/php.ini-development

RUN mv "/usr/local/etc/php/php.ini-development" "/usr/local/etc/php/php.ini"

WORKDIR /php