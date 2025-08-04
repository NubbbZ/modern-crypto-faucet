<?php

return [
    'minimum_payout' => env('MINIMUM_PAYOUT', 1),
    'maximum_payout' => env('MAXIMUM_PAYOUT', 8),
    'payout_interval' => env('PAYOUT_INTERVAL', 24), // in hours : how often a user can request a payout
    'payout_address' => env('PAYOUT_ADDRESS', null),
    'donation_address' => env('DONATION_ADDRESS', 'AZsT8KGD4UzxDALMgtSN3r2wZxNHuALt49'),

    'wallet' => [
        'host' => env('WALLET_HOST', '127.0.0.1:8332'),
        'username' => env('WALLET_USERNAME', null),
        'password' => env('WALLET_PASSWORD', null),
    ],
];
