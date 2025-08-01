<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | This option controls the default session "driver" that will be used on
    | requests. By default, we will use the lightweight native driver but
    | you may specify any of the other wonderful drivers provided here.
=======
<<<<<<< HEAD
    | This option determines the default session driver that is utilized for
    | incoming requests. Laravel supports a variety of storage options to
    | persist session data. Database storage is a great default choice.
=======
    | This option controls the default session "driver" that will be used on
    | requests. By default, we will use the lightweight native driver but
    | you may specify any of the other wonderful drivers provided here.
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    |
    | Supported: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

<<<<<<< HEAD
    'driver' => env('SESSION_DRIVER', 'file'),
=======
<<<<<<< HEAD
    'driver' => env('SESSION_DRIVER', 'database'),
=======
    'driver' => env('SESSION_DRIVER', 'file'),
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Here you may specify the number of minutes that you wish the session
    | to be allowed to remain idle before it expires. If you want them
<<<<<<< HEAD
=======
<<<<<<< HEAD
    | to expire immediately when the browser is closed then you may
    | indicate that via the expire_on_close configuration option.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),
=======
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    | to immediately expire on the browser closing, set that option.
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => false,
<<<<<<< HEAD
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | This option allows you to easily specify that all of your session data
<<<<<<< HEAD
=======
<<<<<<< HEAD
    | should be encrypted before it's stored. All encryption is performed
    | automatically by Laravel and you may use the session like normal.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),
=======
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    | should be encrypted before it is stored. All encryption will be run
    | automatically by Laravel and you can use the Session like normal.
    |
    */

    'encrypt' => false,
<<<<<<< HEAD
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

    /*
    |--------------------------------------------------------------------------
    | Session File Location
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | When using the native session driver, we need a location where session
    | files may be stored. A default has been set for you but a different
    | location may be specified. This is only needed for file sessions.
=======
<<<<<<< HEAD
    | When utilizing the "file" session driver, the session files are placed
    | on disk. The default storage location is defined here; however, you
    | are free to provide another location where they should be stored.
=======
    | When using the native session driver, we need a location where session
    | files may be stored. A default has been set for you but a different
    | location may be specified. This is only needed for file sessions.
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Connection
    |--------------------------------------------------------------------------
    |
    | When using the "database" or "redis" session drivers, you may specify a
    | connection that should be used to manage these sessions. This should
    | correspond to a connection in your database configuration options.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
=======
<<<<<<< HEAD
    | When using the "database" session driver, you may specify the table to
    | be used to store sessions. Of course, a sensible default is defined
    | for you; however, you're welcome to change this to another table.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),
=======
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    | When using the "database" session driver, you may specify the table we
    | should use to manage the sessions. Of course, a sensible default is
    | provided for you; however, you are free to change this as needed.
    |
    */

    'table' => 'sessions',
<<<<<<< HEAD
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

    /*
    |--------------------------------------------------------------------------
    | Session Cache Store
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | While using one of the framework's cache driven session backends you may
    | list a cache store that should be used for these sessions. This value
    | must match with one of the application's configured cache "stores".
=======
<<<<<<< HEAD
    | When using one of the framework's cache driven session backends, you may
    | define the cache store which should be used to store the session data
    | between requests. This must match one of your defined cache stores.
=======
    | While using one of the framework's cache driven session backends you may
    | list a cache store that should be used for these sessions. This value
    | must match with one of the application's configured cache "stores".
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    |
    | Affects: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Session Sweeping Lottery
    |--------------------------------------------------------------------------
    |
    | Some session drivers must manually sweep their storage location to get
    | rid of old sessions from storage. Here are the chances that it will
    | happen on a given request. By default, the odds are 2 out of 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | Here you may change the name of the cookie used to identify a session
    | instance by ID. The name specified here will get used every time a
    | new session cookie is created by the framework for every driver.
=======
<<<<<<< HEAD
    | Here you may change the name of the session cookie that is created by
    | the framework. Typically, you should not need to change this value
    | since doing so does not grant a meaningful security improvement.
=======
    | Here you may change the name of the cookie used to identify a session
    | instance by ID. The name specified here will get used every time a
    | new session cookie is created by the framework for every driver.
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Path
    |--------------------------------------------------------------------------
    |
    | The session cookie path determines the path for which the cookie will
    | be regarded as available. Typically, this will be the root path of
<<<<<<< HEAD
=======
<<<<<<< HEAD
    | your application, but you're free to change this when necessary.
    |
    */

    'path' => env('SESSION_PATH', '/'),
=======
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    | your application but you are free to change this when necessary.
    |
    */

    'path' => '/',
<<<<<<< HEAD
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Domain
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | Here you may change the domain of the cookie used to identify a session
    | in your application. This will determine which domains the cookie is
    | available to in your application. A sensible default has been set.
=======
<<<<<<< HEAD
    | This value determines the domain and subdomains the session cookie is
    | available to. By default, the cookie will be available to the root
    | domain and all subdomains. Typically, this shouldn't be changed.
=======
    | Here you may change the domain of the cookie used to identify a session
    | in your application. This will determine which domains the cookie is
    | available to in your application. A sensible default has been set.
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | HTTPS Only Cookies
    |--------------------------------------------------------------------------
    |
    | By setting this option to true, session cookies will only be sent back
    | to the server if the browser has a HTTPS connection. This will keep
    | the cookie from being sent to you when it can't be done securely.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | HTTP Access Only
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will prevent JavaScript from accessing the
    | value of the cookie and the cookie will only be accessible through
<<<<<<< HEAD
=======
<<<<<<< HEAD
    | the HTTP protocol. It's unlikely you should disable this option.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),
=======
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    | the HTTP protocol. You are free to modify this option if needed.
    |
    */

    'http_only' => true,
<<<<<<< HEAD
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | This option determines how your cookies behave when cross-site requests
    | take place, and can be used to mitigate CSRF attacks. By default, we
<<<<<<< HEAD
    | will set this value to "lax" since this is a secure default value.
=======
<<<<<<< HEAD
    | will set this value to "lax" to permit secure cross-site requests.
    |
    | See: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
=======
    | will set this value to "lax" since this is a secure default value.
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    |
    | Supported: "lax", "strict", "none", null
    |
    */

<<<<<<< HEAD
    'same_site' => 'lax',
=======
<<<<<<< HEAD
    'same_site' => env('SESSION_SAME_SITE', 'lax'),
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

    /*
    |--------------------------------------------------------------------------
    | Partitioned Cookies
    |--------------------------------------------------------------------------
    |
    | Setting this value to true will tie the cookie to the top-level site for
    | a cross-site context. Partitioned cookies are accepted by the browser
    | when flagged "secure" and the Same-Site attribute is set to "none".
    |
    */

<<<<<<< HEAD
    'partitioned' => false,
=======
    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),
=======
    'same_site' => 'lax',
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

];
