# Lego Demo

Demo of [wutongwan/laravel-lego](https://github.com/wutongwan/laravel-lego)

## Initialize Environment

```bash

echo "LC_ALL=en_US.UTF-8" >> /etc/default/locale
locale-gen en_US.UTF-8

apt-get install -y php7.0-cli php7.0-dev php-pear php7.0-fpm \
	php7.0-sqlite3 php7.0-json php7.0-curl php7.0-gd php7.0-mcrypt \
	php7.0-xml php7.0-mbstring php7.0-zip php7.0-bcmath

pear update-channels ; pear upgrade-all

curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/bin/composer


curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
apt-get install -y nodejs
ln -s /usr/bin/nodejs /usr/bin/node
apt-get install npm -y
npm install -g bower


cd __project__
bower update -V
composer update -vvv
php artisan lego:update-components --bower-allow-root

apt-get install nginx
```


## Deploy

```bash
git pull
composer update -vvv --no-dev
php artisan lego:update-components
service php7.0-fpm restart
```
