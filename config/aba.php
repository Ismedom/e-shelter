<?php

return [
    'merchant_id' => env('ABA_MERCHANT_ID'),
    'api_key' => env('ABA_API_KEY'),
    'purchase_url' => env('ABA_PURCHASE_URL', 'https://sandbox.payway.com.kh/api/purchase'),
    'check_url' => env('ABA_CHECK_URL', 'https://sandbox.payway.com.kh/api/check'),
];
