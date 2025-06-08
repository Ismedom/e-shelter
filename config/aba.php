<?php

return [
    'merchant_id' => env('ABA_MERCHANT_ID'),
    'api_key'     => env('ABA_API_KEY'),
    'endpoint'    => env('ABA_ENDPOINT', 'https://checkout-sandbox.payway.com.kh/api/payment-gateway/v1'),
];
