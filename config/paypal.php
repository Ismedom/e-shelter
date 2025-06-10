<?php

return [
    'mode' => env('PAYPAL_MODE', 'sandbox'),
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'client_secret' => env('PAYPAL_CLIENT_SECRET'),
    'sandbox_url' => 'https://api-m.sandbox.paypal.com',
    'live_url' => 'https://api-m.paypal.com',
    'currency' => env('PAYPAL_CURRENCY', 'USD'),
];
