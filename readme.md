# Lego Demo

Demo of [wutongwan/laravel-lego](https://github.com/wutongwan/laravel-lego)

## Demo Code

- [resources/demos](resources/demos)
- [view](resources/views/demo.blade.php)

## Initialize Environment

1. 创建 .env 文件
2. 启动 `docker-compose up -d`


## Deploy

```bash
git pull
docker-compose build php-fpm
docker-compose up --no-deps -d php-fpm
```
