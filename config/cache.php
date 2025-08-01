<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
=======
<<<<<<< HEAD
    | This option controls the default cache store that will be used by the
    | framework. This connection is utilized if another isn't explicitly
    | specified when running a cache operation inside the application.
    |
    */

    'default' => env('CACHE_STORE', 'database'),
=======
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    | This option controls the default cache connection that gets used while
    | using this caching library. This connection is used when another is
    | not explicitly specified when executing a given caching function.
    |
    */

    'default' => env('CACHE_DRIVER', 'file'),
<<<<<<< HEAD
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
<<<<<<< HEAD
    | Supported drivers: "apc", "array", "database", "file",
    |         "memcached", "redis", "dynamodb", "octane", "null"
=======
<<<<<<< HEAD
    | Supported drivers: "array", "database", "file", "memcached",
    |                    "redis", "dynamodb", "octane", "null"
=======
    | Supported drivers: "apc", "array", "database", "file",
    |         "memcached", "redis", "dynamodb", "octane", "null"
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    |
    */

    'stores' => [

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
        'apc' => [
            'driver' => 'apc',
        ],

<<<<<<< HEAD
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
<<<<<<< HEAD
            'table' => 'cache',
            'connection' => null,
            'lock_connection' => null,
=======
<<<<<<< HEAD
            'connection' => env('DB_CACHE_CONNECTION'),
            'table' => env('DB_CACHE_TABLE', 'cache'),
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),
=======
            'table' => 'cache',
            'connection' => null,
            'lock_connection' => null,
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
<<<<<<< HEAD
            'lock_path' => storage_path('framework/cache/data'),
=======
<<<<<<< HEAD
            'lock_path' => storage_path('framework/cache/data'),
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
<<<<<<< HEAD
            'connection' => 'cache',
            'lock_connection' => 'default',
=======
<<<<<<< HEAD
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'),
=======
            'connection' => 'cache',
            'lock_connection' => 'default',
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        'octane' => [
            'driver' => 'octane',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | When utilizing the APC, database, memcached, Redis, or DynamoDB cache
    | stores there might be other applications using the same cache. For
=======
<<<<<<< HEAD
    | When utilizing the APC, database, memcached, Redis, and DynamoDB cache
    | stores, there might be other applications using the same cache. For
=======
    | When utilizing the APC, database, memcached, Redis, or DynamoDB cache
    | stores there might be other applications using the same cache. For
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    | that reason, you may prefix every cache key to avoid collisions.
    |
    */

    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'),

];
