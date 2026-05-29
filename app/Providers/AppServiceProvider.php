<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * De AppServiceProvider is de plek waar je algemene services configureert
 * die door de hele applicatie gebruikt worden.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * In de 'register' methode kun je services registreren bij de container.
     */
    public function register(): void
    {
        //
    }

    /**
     * In de 'boot' methode kun je dingen configureren die moeten gebeuren
     * zodra de applicatie volledig is opgestart.
     */
    public function boot(): void
    {
        //
    }
}
