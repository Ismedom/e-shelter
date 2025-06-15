<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class AbaPayController extends Controller
{
    protected string $merchantId;
    protected string $apiKey;
    protected string $purchaseUrl;
    protected string $checkUrl;
    protected Client $httpClient;

    public function __construct()
    {
        $this->merchantId = env('ABA_MERCHANT_ID', '');
        $this->apiKey = env('ABA_API_KEY', '');
        $this->purchaseUrl = 'https://checkout-sandbox.payway.com.kh/api/payment-gateway/v1/payments/purchase';
        $this->checkUrl = 'https://checkout-sandbox.payway.com.kh/api/payment-gateway/v1/payments/check-transaction-2';
        $this->httpClient = new Client([
            'timeout' => 30,
            'verify' => false,
        ]);
    }

    public function pay(Request $request)
    {
        if (empty($this->merchantId) || empty($this->apiKey)) {
            return response()->json([
                'status' => [
                    'code' => '97',
                    'message' => 'Missing merchant credentials',
                ],
            ], 500);
        }

        $tranId = now()->format('ymdHis') . rand(100, 999);
        $reqTime = now()->utc()->format('YmdHis');
        $amount = number_format($request->input('amount', 5.00), 2, '.', '');
        $currency = 'USD';
        $paymentOption = 'abapay_deeplink';

        $returnUrl = route('aba.success');
        $cancelUrl = route('aba.cancel');

        $formData = [
            'req_time' => $reqTime,
            'merchant_id' => $this->merchantId,
            'tran_id' => $tranId,
            'firstname' => $request->input('firstname', 'John'),
            'lastname' => $request->input('lastname', 'Doe'),
            'email' => $request->input('email', 'john@example.com'),
            'phone' => $request->input('phone', '0123456789'),
            'type' => 'purchase',
            'payment_option' => $paymentOption,
            'items' => $request->input('items', 'Product 1'),
            'shipping' => number_format($request->input('shipping', 0), 2, '.', ''),
            'amount' => $amount,
            'currency' => $currency,
            'return_url' => $returnUrl,
            'cancel_url' => $cancelUrl,
        ];

        $optionalFields = [
            'continue_success_url',
            'return_deeplink',
            'custom_fields',
            'return_params',
            'view_type',
            'payment_gate',
            'payout',
            'additional_params',
            'lifetime',
            'google_pay_token'
        ];

        foreach ($optionalFields as $field) {
            $value = $request->input($field);
            if (!empty($value)) {
                $formData[$field] = $value;
            } else {
                $formData[$field] = '';
            }
        }

        $stringToSign = 
            $formData['req_time'] .
            $formData['merchant_id'] .
            $formData['tran_id'] .
            $formData['amount'] .
            $formData['items'] .
            $formData['shipping'] .
            $formData['firstname'] .
            $formData['lastname'] .
            $formData['email'] .
            $formData['phone'] .
            $formData['type'] .
            $formData['payment_option'] .
            $formData['return_url'] .
            $formData['cancel_url'] .
            $formData['continue_success_url'] .
            $formData['return_deeplink'] .
            $formData['currency'] .
            $formData['custom_fields'] .
            $formData['return_params'] .
            $formData['payout'] .
            $formData['lifetime'] .
            $formData['additional_params'] .
            $formData['google_pay_token'];

        $hash = base64_encode(hash_hmac('sha512', $stringToSign, $this->apiKey, true));
        $formData['hash'] = $hash;

        try {
            $response = $this->httpClient->post($this->purchaseUrl, [
                'form_params' => $formData,
                'headers' => [
                    'Accept' => 'application/json',
                    'User-Agent' => 'Laravel-ABA-PayWay/1.0',
                ],
            ]);

            $body = (string) $response->getBody();
            // dd($body);
            $statusCode = $response->getStatusCode();

            if ($statusCode !== 200) {
                return response()->json([
                    'status' => [
                        'code' => '99',
                        'message' => "ABA API returned status code {$statusCode}",
                    ],
                    'error' => $body,
                ], $statusCode);
            }

            $data = json_decode($body, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return response()->json([
                    'status' => [
                        'code' => '98',
                        'message' => 'Failed to decode JSON response',
                    ],
                    'raw_response' => $body,
                ], 500);
            }

            $qrCode = new QrCode($data['qrString']);
            $writer = new PngWriter();
            $result = $writer->write($qrCode);
            $qrImageFromString = $result->getString();
            return view('aba.qr', [
                'qrImage' => 'data:image/png;base64,' . base64_encode($qrImageFromString),
                'abapay_deeplink' => $data['abapay_deeplink'],
                'app_store' => $data['app_store'],
                'play_store' => $data['play_store'],
            ]);
        } catch (RequestException $e) {
            $errorMessage = $e->getMessage();

            if ($e->hasResponse()) {
                $errorBody = (string) $e->getResponse()->getBody();
                $errorData = json_decode($errorBody, true);
                if ($errorData && isset($errorData['status']['message'])) {
                    $errorMessage = $errorData['status']['message'];
                }
            }

            return response()->json([
                'status' => [
                    'code' => '99',
                    'message' => 'Request to ABA API failed: ' . $errorMessage,
                ],
                'debug_info' => [
                    'tran_id' => $tranId,
                    'req_time' => $reqTime,
                    'merchant_id' => $this->merchantId,
                    'url' => $this->purchaseUrl,
                ]
            ], 500);
        }
    }

    public function check($tranId)
    {
        $reqTime = now()->utc()->format('YmdHis');
        $b4Hash = $reqTime . $this->merchantId . $tranId;
        $hash = base64_encode(hash_hmac('sha512', $b4Hash, $this->apiKey, true));

        try {
            $response = $this->httpClient->post($this->checkUrl, [
                'json' => [
                    'req_time' => $reqTime,
                    'merchant_id' => $this->merchantId,
                    'tran_id' => $tranId,
                    'hash' => $hash,
                ],
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
            ]);

            $body = (string) $response->getBody();
            $data = json_decode($body, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                return response()->json([
                    'status' => [
                        'code' => '98',
                        'message' => 'Failed to decode JSON response',
                    ],
                    'raw_response' => $body,
                ], 500);
            }

            return response()->json($data);

        } catch (RequestException $e) {
            $errorMessage = $e->getMessage();
            if ($e->hasResponse()) {
                $errorBody = (string) $e->getResponse()->getBody();
                $errorData = json_decode($errorBody, true);
                if ($errorData && isset($errorData['status']['message'])) {
                    $errorMessage = $errorData['status']['message'];
                }
            }

            return response()->json([
                'status' => [
                    'code' => '99',
                    'message' => 'Request to ABA API failed: ' . $errorMessage,
                ],
            ], 500);
        }
    }


    public function success()
    {
        return 'Payment successful';
    }

    public function cancel()
    {
        return 'Payment cancelled';
    }
}
