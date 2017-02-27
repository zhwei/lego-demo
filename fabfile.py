#!/usr/bin/env python
# -*- coding: utf-8 -*-

from fabric.api import run, cd

WEB_PATH = '/home/web/lego-demo'

def deploy():
    with cd(WEB_PATH):
        run('git reset --hard')
        run('git pull')
        run('composer update -vvv')
        run('php artisan lego:update-components --bower-allow-root')
        run('service php7.0-fpm restart')

def migrate_refresh():
    with cd(WEB_PATH):
        run('php artisan migrate:refresh --force')
