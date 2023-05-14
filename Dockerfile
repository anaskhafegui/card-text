FROM php:8.1-fpm-alpine

RUN apk add --no-cache nginx wget nodejs npm mysql-client mysql-dev

RUN mkdir -p /run/nginx

COPY docker/nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /app
COPY . /app

RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"


RUN docker-php-ext-install pdo_mysql mysqli

RUN cd /app && \
/usr/local/bin/composer install --no-dev

RUN chown -R www-data: /app

WORKDIR /app

CMD php artisan migrate && sh /app/docker/startup.sh
