<?php

return [

    'params' => [],

    /*
     * End points and URLs
     */
    'endpoint' => env('LF_ENDPOINT', 'LF_ENDPOINT'),

    'urls' => [
        'product' => env('LF_PRODUCT', 'LF_PRODUCT'),
        'adverts' => env('LF_ADVERT', 'LF_ADVERT'),
    ],

    'version' => env('LF_VERSION', 'LF_VERSION')
];
