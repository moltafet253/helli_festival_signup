<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'allowed_origins' => ['http://ssmp.ismc.ir'],
    'allowed_methods' => ['GET', 'POST'],
    'allowed_headers' => ['Content-Type', 'Authorization'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,

];
