<?php
namespace App\Supports;

trait OTPGenerate
{
    function generateOTP(int $length = 6, bool $numericOnly = true): string
    {
        $characters = $numericOnly ? '0123456789' : 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $otp = '';
        $used = [];

        for($x =0; $x <= $length-1; $x++){
            $char = $characters[random_int(0, strlen($characters) - 1)];
            $otp .= $char;
            $used[] = $char;
        }   
        return $otp;
    }

}