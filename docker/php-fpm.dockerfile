FROM php:7.2-fpm-alpine

RUN apk add --no-cache git openssh-client composer
ENV COMPOSER_ALLOW_SUPERUSER 1
