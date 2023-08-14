<?php

namespace App\Providers;

use App\BackingClasses\Char;
use App\Facades\Char as FacadesChar;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Char::class, function(){
            return new Char();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
