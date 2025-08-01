<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

=======
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Facade;

>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
=======
<<<<<<< HEAD
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
=======
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
<<<<<<< HEAD
    | your application so that it is used when running Artisan tasks.
=======
<<<<<<< HEAD
    | the application so that it's available within Artisan commands.
=======
    | your application so that it is used when running Artisan tasks.
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

<<<<<<< HEAD
    'asset_url' => env('ASSET_URL'),

=======
<<<<<<< HEAD
=======
    'asset_url' => env('ASSET_URL'),

>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
<<<<<<< HEAD
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
=======
<<<<<<< HEAD
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
=======
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
<<<<<<< HEAD
=======
<<<<<<< HEAD
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),
=======
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',
<<<<<<< HEAD
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
=======
<<<<<<< HEAD
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],
=======
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',
<<<<<<< HEAD
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

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
<<<<<<< HEAD
        'driver' => 'file',
        // 'store' => 'redis',
=======
<<<<<<< HEAD
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

=======
        'driver' => 'file',
        // 'store'  => 'redis',
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

<<<<<<< HEAD
    'providers' => ServiceProvider::defaultProviders()->merge([
=======
    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
<<<<<<< HEAD
    ])->toArray(),
=======

    ],
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
<<<<<<< HEAD
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),

=======
        // 'ExampleClass' => App\Example\ExampleClass::class,
    ])->toArray(),

>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
];
