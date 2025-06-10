<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PayWayService
{
    public function createPayment($orderData)
    {
        $requestData = [
            'req_time' => now()->format('YmdHis'),
            'merchant_id' => env('PAYWAY_MERCHANT_ID'),
            'order_id' => $orderData['order_id'],
            'amount' => $orderData['amount'],
            'currency' => $orderData['currency'] ?? 'USD',
            'return_url' => route('payment.return'),
            'customer_name' => $orderData['customer_name'],
            'customer_email' => $orderData['customer_email'],
        ];

        // Generate hash
        $hashString = $requestData['req_time'] . 
                     $requestData['merchant_id'] . 
                     $requestData['order_id'] . 
                     $requestData['amount'] . 
                     $requestData['currency'] . 
                     env('PAYWAY_API_KEY');
        
        $requestData['hash'] = hash('sha512', $hashString);

        $response = Http::post('https://checkout-sandbox.payway.com.kh/api/payment-gateway/v1/payments/purchase', $requestData);
       if ($response->successful()) {
            return [
                'success' => true,
                'payment_html' => $response->body(),
                'content_type' => 'html'
            ];
        }

        return [
            'success' => false,
            'error' => 'Payment request failed',
            'status_code' => $response->status()
        ];
    }
}
