<?php

return [
    /*
    laravelgooglesheet@smiling-sweep-296108.iam.gserviceaccount.com 


    |----------------------------------------------------------------------------
    | Google application name
    |----------------------------------------------------------------------------
    */
    'application_name' => env('GOOGLE_APPLICATION_NAME', ''),

    /*
    |----------------------------------------------------------------------------
    | Google OAuth 2.0 access
    |----------------------------------------------------------------------------
    |
    | Keys for OAuth 2.0 access, see the API console at
    | https://developers.google.com/console
    |
    */
    'client_id' => env('GOOGLE_CLIENT_ID', '92485868768-hij72ph5378d0831i5squg79f80cmsdg.apps.googleusercontent.com'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET', 'YCz8-ZoRF64M6LYPaAmzpz5S'),
    'redirect_uri' => env('GOOGLE_REDIRECT', ''),
    'scopes' => [\Google_Service_Sheets::DRIVE, \Google_Service_Sheets::SPREADSHEETS],
    'access_type' => 'online',
    'approval_prompt' => 'auto',

    /*
    |----------------------------------------------------------------------------
    | Google developer key
    |----------------------------------------------------------------------------
    |
    | Simple API access key, also from the API console. Ensure you get
    | a Server key, and not a Browser key.
    |
    */
    'developer_key' => env('GOOGLE_DEVELOPER_KEY', ''),

    /*
    |----------------------------------------------------------------------------
    | Google service account
    |----------------------------------------------------------------------------
    |
    | Set the credentials JSON's location to use assert credentials, otherwise
    | app engine or compute engine will be used.
    |
    */
    'service' => [
        /*
        | Enable service account auth or not.
        */
        'enable' => env('GOOGLE_SERVICE_ENABLED', false),

        /*
         * Path to service account json file. You can also pass the credentials as an array
         * instead of a file path.
         */
        // 'file' =>"",
        // 'file' =>[
        //     "type"=> env("type"),
        //     "project_id"=> env("project_id"),
        //     "private_key_id"=> env("private_key_id"),
        //     "private_key"=> env("private_key"),
        //     "client_email"=> env("client_email"),
        //     "client_id"=> env("client_id"),
        //     "auth_uri"=> env("auth_uri"),
        //     "token_uri"=> env("token_uri"),
        //     "auth_provider_x509_cert_url"=> env("auth_provider_x509_cert_url"),
        //     "client_x509_cert_url"=> env("client_x509_cert_url"),
        //   ],
        'file' => storage_path('credentials.json'),
        // 'file' => storage_path('credentials.json'),
        // 'file' => env('GOOGLE_SERVICE_ACCOUNT_JSON_LOCATION', ''),
    ],

    /*
    |----------------------------------------------------------------------------
    | Additional config for the Google Client
    |----------------------------------------------------------------------------
    |
    | Set any additional config variables supported by the Google Client
    | Details can be found here:
    | https://github.com/google/google-api-php-client/blob/master/src/Google/Client.php
    |
    | NOTE: If client id is specified here, it will get over written by the one above.
    |
    */
    'config' => [],
];
