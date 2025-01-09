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

    // Define the API paths and other endpoints where CORS applies
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // Define the allowed HTTP methods
    'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'],

    // Define the allowed origins (frontend URLs)
    'allowed_origins' => ['http://localhost:3000', 'http://127.0.0.1:3000'],

    // If you have dynamic patterns for origins, you can add them here
    'allowed_origins_patterns' => [],

    // Restrict to only the headers that are necessary for your API
    'allowed_headers' => [
        'Content-Type',
        'X-Requested-With',
        'Authorization',
        'Accept',
        'Origin',
        'X-CSRF-Token',
    ],

    // Specify headers to expose to the browser
    'exposed_headers' => ['Authorization'],

    // Define the max age for caching preflight requests (in seconds)
    'max_age' => 3600,

    // Enable support for credentials (e.g., cookies, Authorization headers)
    'supports_credentials' => true,
];
