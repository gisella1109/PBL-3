<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
=======
<<<<<<< HEAD
    | This option controls the default mailer that is used to send all email
    | messages unless another mailer is explicitly specified when sending
    | the message. All additional mailers can be configured within the
    | "mailers" array. Examples of each type of mailer are provided.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),
=======
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    | This option controls the default mailer that is used to send any email
    | messages sent by your application. Alternative mailers may be setup
    | and used as needed; however, this mailer will be used by default.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'),
<<<<<<< HEAD
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
<<<<<<< HEAD
=======
<<<<<<< HEAD
    | Laravel supports a variety of mail "transport" drivers that can be used
    | when delivering an email. You may specify which one you're using for
    | your mailers below. You may also add additional mailers if needed.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "resend", "log", "array",
    |            "failover", "roundrobin"
=======
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    | Laravel supports a variety of mail "transport" drivers to be used while
    | sending an e-mail. You will specify which one you are using for your
    | mailers below. You are free to add additional mailers as required.
    |
<<<<<<< HEAD
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "log", "array", "failover", "roundrobin"
=======
    | Supported: "smtp", "sendmail", "mailgun", "ses",
    |            "postmark", "log", "array", "failover"
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    |
    */

    'mailers' => [
<<<<<<< HEAD
        'smtp' => [
            'transport' => 'smtp',
            'url' => env('MAIL_URL'),
=======
<<<<<<< HEAD

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
=======
        'smtp' => [
            'transport' => 'smtp',
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
            'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
<<<<<<< HEAD
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
        ],

        'ses' => [
            'transport' => 'ses',
        ],

<<<<<<< HEAD
        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => null,
=======
<<<<<<< HEAD
        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

<<<<<<< HEAD
        'mailgun' => [
            'transport' => 'mailgun',
            // 'client' => [
            //     'timeout' => 5,
            // ],
=======
        'resend' => [
            'transport' => 'resend',
=======
        'mailgun' => [
            'transport' => 'mailgun',
        ],

        'postmark' => [
            'transport' => 'postmark',
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
        ],
<<<<<<< HEAD
=======

=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
=======
<<<<<<< HEAD
    | You may wish for all emails sent by your application to be sent from
    | the same address. Here you may specify a name and address that is
    | used globally for all emails that are sent by your application.
=======
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
    /*
    |--------------------------------------------------------------------------
    | Markdown Mail Settings
    |--------------------------------------------------------------------------
    |
    | If you are using Markdown based email rendering, you may configure your
    | theme and component paths here, allowing you to customize the design
    | of the emails. Or, you may simply stick with the Laravel defaults!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

<<<<<<< HEAD
=======
>>>>>>> efb363e (initial value)
>>>>>>> 8498eb2529faa2a04cb51e402f03bc4c6f493ac8
];
