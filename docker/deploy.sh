#!/usr/bin/env bash

cd "$(dirname "$0")/../"

docker-compose run --rm php-fpm composer install --no-progress
docker-compose restart php-fpm

