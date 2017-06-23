#!/usr/bin/env python
# -*- coding: utf-8 -*-

from fabric.api import run, cd

WEB_PATH = '/home/web/lego-demo'

def deploy(update_vendor = False):
    with cd(WEB_PATH):
        run('git reset --hard')
        run('git pull')
        if update_vendor:
            run('composer update -vvv')
        run('service php7.0-fpm restart')

def migrate_refresh():
    with cd(WEB_PATH):
        run('php artisan migrate:refresh --force')
