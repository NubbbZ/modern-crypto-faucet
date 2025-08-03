<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Wallet Configuration
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for the wallet service.
    | You can set the host, username, password, and other related settings
    | here to connect to your wallet service.
    |
    */
    
    'host' => env('WALLET_HOST', null),
    'username' => env('WALLET_USERNAME', null),
    'password' => env('WALLET_PASSWORD', null),
    'address' => env('WALLET_ADDRESS', null),
    'donation_address' => env('WALLET_DONATION_ADDRESS', null),
];
