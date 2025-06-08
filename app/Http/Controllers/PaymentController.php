<?php
namespace App\Http\Controllers;

use App\Services\PayWayService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(private PayWayService $payWayService) {}

    public function create(Request $request)
    {
        $orderData = [
            'order_id' => 'ORDER_' . time(),
            'amount' => $request->amount,
            'currency' => 'USD',
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
        ];

        $result = $this->payWayService->createPayment($orderData);

         if ($result['success'] && isset($result['payment_html'])) {
            return response($result['payment_html']);
        }
    
        if (isset($result['payment_url'])) {
            return redirect($result['payment_url']);
        }

        return back()->with('error', 'Payment failed');
    }

    public function return(Request $request)
    {
        $status = $request->input('status');
        
        if ($status === 'success') {
            return view('payment.success');
        }
        
        return view('payment.failed');
    }
}