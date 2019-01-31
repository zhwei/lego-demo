#!/usr/bin/env sh

set -e

# set host
echo "127.0.0.1 php-fpm" >> /etc/hosts


trap "echo TRAPed signal" INT QUIT TERM

# create sqlite database if not exists
cd /var/www/html
if ! [[ -f database/database.sqlite ]]; then
    touch database/database.sqlite
    php artisan migrate
fi

# start nginx and php-fpm
nginx
php-fpm -D

while true ; do
  tail -f /var/log/nginx/*.log
done
