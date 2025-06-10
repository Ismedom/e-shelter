<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhqrController extends Controller
{
    public function showForm()
    {
        return view('khqr.form');
    }

    public function generateQr(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:100',
        ]);

        $merchantName = "Your Merchant Name";
        $accountId = "merchant@bank"; 
        $amount = number_format($request->amount, 2, '.', '');

        $khqrPayload = "00020101021129370016A00000067701011101130066{$accountId}520458125303KHR5405{$amount}5802KH5913{$merchantName}6009Phnom Penh6304"; // dummy checksum

        return response()->json([
            'khqrPayload' => $khqrPayload,
        ]);
    }
}
