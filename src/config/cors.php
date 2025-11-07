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

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // TODO: GET, POST, PUT, DELETE 指定する
    'allowed_methods' => ['*'],

    // TODO: 環境変数で設定する
    'allowed_origins' => ['http://localhost:3000'],

    'allowed_origins_patterns' => [],

    // TODO: HTTPヘッダー（例: Content-Type, X-Requested-With, Authorization）を明示的に指定するようにする
    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
