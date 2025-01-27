<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        if (config('app.env') === 'https://aplicacionenlanube.cetivirgendelapuerta.com/healthapp/public/login') {
            $this->app['request']->server->set('HTTP', true);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
