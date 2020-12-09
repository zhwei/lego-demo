FROM php:7.3-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER 1

# php ext
RUN docker-php-ext-enable opcache
RUN apk add --no-cache libzip-dev \
    && docker-php-ext-configure zip --with-libzip=/usr/include \
    && docker-php-ext-install zip

RUN apk add --no-cache git openssh-client composer nginx
RUN mkdir /run/nginx && rm /etc/nginx/conf.d/default.conf
RUN sed -i "s/user\ nginx/user\ www-data/g" /etc/nginx/nginx.conf

COPY docker/gcp.start.sh /start.sh
COPY docker/gcp.fpm-www.conf /usr/local/etc/php-fpm.d/www.conf
COPY docker/lego.conf /etc/nginx/conf.d
COPY . /var/www/html
RUN find storage -type f | xargs -n 1000 rm

WORKDIR /var/www/html
RUN composer install --no-dev && chown www-data:www-data -R /var/www/html

ENTRYPOINT ["/start.sh"]
