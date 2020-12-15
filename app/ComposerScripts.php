<?php

namespace App;

class ComposerScripts
{
    public static function postAutoloadDump()
    {
        chdir(base_path());
        exec('php artisan package:discover');
    }

    public static function updateLegoAssets()
    {
        chdir(base_path());
        exec('php artisan vendor:publish --tag=lego-assets --force');
    }
}
