<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('app.env') === 'local') {
            $this->app->register(
                \Mpociot\LaravelTestFactoryHelper\TestFactoryHelperServiceProvider::class
            );

            // reset faker's locale
            $this->app->singleton(\Faker\Generator::class, function () {
                return \Faker\Factory::create('zh_CN');
            });
        }
    }
}
