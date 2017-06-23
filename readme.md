# Lego Demo

Demo of [wutongwan/laravel-lego](https://github.com/wutongwan/laravel-lego)

## Demo Code

- [resources/demos](resources/demos)
- [view](resources/views/demo.blade.php)

## Initialize Environment

```bash
# set locale
echo "LC_ALL=en_US.UTF-8" >> /etc/default/locale
locale-gen en_US.UTF-8

# install php
apt-get install -y php7.0-cli php7.0-dev php-pear php7.0-fpm \
	php7.0-sqlite3 php7.0-json php7.0-curl php7.0-gd php7.0-mcrypt \
	php7.0-xml php7.0-mbstring php7.0-zip php7.0-bcmath
pear update-channels ; pear upgrade-all

# install composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/bin/composer
cd __project__
composer update -vvv

# run server
php artisan serv --port 8080 -vvv
```


## Deploy

```bash
git pull
composer update -vvv --no-dev
service php7.0-fpm restart
```
