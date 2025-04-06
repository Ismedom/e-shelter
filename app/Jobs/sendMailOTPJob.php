<?php

namespace App\Jobs;

use App\Mail\HotelOwnerMailVerify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendMailOTPJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $hotelOwner;
    public $otp;

    public function __construct($email, $hotelOwner, $otp)
    {
        $this->email = $email;
        $this->hotelOwner = $hotelOwner;
        $this->otp = $otp;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new HotelOwnerMailVerify($this->otp, $this->hotelOwner));
    }
}
