<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Si no está en local, forzamos el esquema HTTPS
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
