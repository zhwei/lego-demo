# Lego Demo

Demo of [wutongwan/laravel-lego](https://github.com/wutongwan/laravel-lego)

## Demo Code

- [resources/demos](resources/demos)
- [view](resources/views/demo.blade.php)

## Initialize Environment

```bash
docker-compose run --rm php-fpm composer install
cp .env.example .env
docker-compose run --rm php-fpm php artisan key:generate
docker-compose up -d
```


## Deploy

```bash
git pull
docker-compose run --rm php-fpm composer install
docker-compose restart php-fpm
```
