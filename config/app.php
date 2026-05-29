<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Applicatie Naam
    |--------------------------------------------------------------------------
    |
    | Deze waarde is de naam van je applicatie. Deze wordt gebruikt wanneer het
    | framework de naam van de applicatie moet plaatsen in een notificatie of
    | andere UI-elementen.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Applicatie Omgeving
    |--------------------------------------------------------------------------
    |
    | Deze waarde bepaalt de "omgeving" waarin je applicatie momenteel draait.
    | Dit kan bepalen hoe je verschillende services configureert die de
    | applicatie gebruikt. Stel dit in je ".env" bestand in.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Applicatie Debug Modus
    |--------------------------------------------------------------------------
    |
    | Wanneer je applicatie in debug-modus staat, worden gedetailleerde
    | foutmeldingen met stack traces getoond bij elke fout. Als dit
    | uitgeschakeld is, wordt een simpele generieke foutpagina getoond.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Applicatie URL
    |--------------------------------------------------------------------------
    |
    | Deze URL wordt gebruikt door de console om URL's correct te genereren
    | bij het gebruik van de Artisan command-line tool. Je moet dit instellen
    | op de root van je applicatie.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Applicatie Tijdzone
    |--------------------------------------------------------------------------
    |
    | Hier kun je de standaard tijdzone voor je applicatie opgeven, die
    | gebruikt zal worden door de PHP datum- en tijd-functies.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Applicatie Taalconfiguratie
    |--------------------------------------------------------------------------
    |
    | De taal van de applicatie bepaalt de standaardtaal die gebruikt zal worden
    | door de vertaalmethoden van Laravel.
    |
    */

    'locale' => env('APP_LOCALE', 'nl'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'nl_NL'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
