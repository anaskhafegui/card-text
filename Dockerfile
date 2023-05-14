FROM php:8.1-fpm-alpine
RUN apk add --no-cache nginx wget nodejs npm

RUN mkdir -p /run/nginx


COPY docker/nginx.conf /etc/nginx/nginx.conf


RUN mkdir -p /app
COPY . /app

RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"


RUN cd /app && \
/usr/local/bin/composer install --no-dev


# MySQL setup
RUN apt-get update && \
    apt-get install -y mysql-server && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    service mysql start && \
    mysql -e "CREATE DATABASE designs;" && \
    mysql -e "CREATE USER 'root'@'%' IDENTIFIED BY '';" && \
    mysql -e "GRANT ALL PRIVILEGES ON designs.* TO 'root'@'%';" && \
    mysql -e "FLUSH PRIVILEGES;"


RUN chown -R www-data: /app

CMD sh /app/docker/startup.sh

