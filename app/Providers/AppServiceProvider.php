<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         if (config('app.env') === 'explorers') {
        URL::forceScheme('https://marketplacebackup-036910b2ff5f.herokuapp.com');
    }
    }
}
