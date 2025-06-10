<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class PaypalController extends Controller
{
    protected $client;
    protected $paypalConfig;

    public function __construct()
    {
        $this->paypalConfig = Config::get('paypal');
        $this->client = new Client([
            'base_uri' => $this->paypalConfig['mode'] === 'sandbox' ? $this->paypalConfig['sandbox_url'] : $this->paypalConfig['live_url'],
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->getAccessToken()
            ]
        ]);
    }

    protected function getAccessToken()
    {
        $client = new Client([
            'base_uri' => $this->paypalConfig['mode'] === 'sandbox' ? $this->paypalConfig['sandbox_url'] : $this->paypalConfig['live_url']
        ]);

        $response = $client->post('v1/oauth2/token', [
            'auth' => [
                $this->paypalConfig['client_id'],
                $this->paypalConfig['client_secret']
            ],
            'form_params' => [
                'grant_type' => 'client_credentials'
            ]
        ]);

        $result = json_decode($response->getBody(), true);
        return $result['access_token'];
    }

    public function createOrder(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'currency_code' => 'required|string',
            'description' => 'required|string',
            'return_url' => 'required|url',
            'cancel_url' => 'required|url'
        ]);

        try {
            $response = $this->client->post('v2/checkout/orders', [
                'json' => [
                    'intent' => 'CAPTURE',
                    'purchase_units' => [[
                        'amount' => [
                            'currency_code' => $validated['currency_code'],
                            'value' => $validated['amount']
                        ],
                        'description' => $validated['description']
                    ]],
                    'application_context' => [
                        'return_url' => $validated['return_url'],
                        'cancel_url' => $validated['cancel_url']
                    ]
                ]
            ]);

            $result = json_decode($response->getBody(), true);
            return response()->json([
                'success' => true,
                'data' => $result
            ]);
        } catch (\Exception $e) {
            Log::error('PayPal Order Creation Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create PayPal order'
            ], 500);
        }
    }

    public function captureOrder(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|string'
        ]);

        try {
            $response = $this->client->post("v2/checkout/orders/{$validated['order_id']}/capture");
            $result = json_decode($response->getBody(), true);

            return response()->json([
                'success' => true,
                'data' => $result
            ]);
        } catch (\Exception $e) {
            Log::error('PayPal Capture Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to capture payment'
            ], 500);
        }
    }
}
