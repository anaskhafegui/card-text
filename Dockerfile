FROM php:8.1-fpm-alpine
RUN apk add --no-cache nginx
RUN mkdir -p /run/nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf
RUN mkdir -p /app
COPY . /app
RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"
RUN cd /app && \
/usr/local/bin/composer install --no-dev

RUN apk add --no-cache nginx wget mysql-client mysql-dev

RUN chown -R www-data: /app

WORKDIR /app

CMD php artisan migrate && sh /app/docker/startup.sh

