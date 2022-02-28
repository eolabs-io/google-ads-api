<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'database' => [
        'connection' => env('DB_GOOGLE_ADS_API_CONNECTION'),
    ],

    'clientId' => env('GOOGLE_ADS_API_CLIENT_ID'),
    'clientSecret' => env('GOOGLE_ADS_API_CLIENT_SECRET'),

    'developerToken' => env('GOOGLE_ADS_API_DEVELOPER_TOKEN'),

    'customerId' => env('GOOGLE_ADS_API_CUSTOMER_ID'),
];
