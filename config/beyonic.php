<?php

return [
    'debug' => env('BEYONIC_DEBUG', true),

    'api' => [
        'base_uri' => env('BEYONIC_API_URI', 'https://api.beyonic.com/api/'),
        'token' => env('BEYONIC_API_TOKEN'),
        'version' => env('BEYONIC_API_VERSION', 'v3'),
    ],

    'collection' => [
        'currency' => env('BEYONIC_CURRENCY', 'BXC'),
        'send_instructions' => env('BEYONIC_SEND_INSTRUCTIONS', true),
    ],

    'country_codes' => [
        'BXC' => '80',
        'KES' => '254',
        'UGX' => '256',
    ],

    /*
     * GuzzleHttp client request options.
     * http://docs.guzzlephp.org/en/stable/request-options.html
     */
    'guzzle' => [
        'options' => [
            // 'verify' => false,
        ],
    ],
];
