<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\AuthRequest;
use App\Jobs\sendMailOTPJob;
use App\Models\User;
use App\Supports\OTPGenerate;
use Carbon\Carbon;
use Error;

class AuthController extends Controller
{
    use OTPGenerate;

    public $auth;
    public function __construct()
    {
      $this->auth = app(\App\Actions\Auth\Create::class);
    }

    public function showRegisterForm()
    {
        return view('pages.auth.register');
    }

    public function register(AuthRequest $request)
    {
       try{
            
            $newUser = $this->auth->create($request->validated());
            $otp = $this->generateOTP(6, true);
            sendMailOTPJob::dispatch($newUser->email, "Sir/Madam",  $otp);
            $newUser->update([
                'otp' => $otp,
                'otp_expired' => Carbon::now()->addMinutes(5),
            ]);
            Auth::login($newUser);
            return redirect()->route('verify');
       }catch(\Exception $e){
            return redirect()->route('');
       }
    }

    public function verifyEmail()
    {
        return view('pages.mail.hotel-owner');
    }

    public function verifyEmailOTP(Request $request)
    {
        try{
            $codes = collect(range(1, 6))
                ->mapWithKeys(fn($i) => ["code_$i" => 'required|numeric']);
            $request->validate($codes->toArray());
            $otp = collect(range(1, 6))
                ->map(fn($i) => $request->input("code_$i"))
                ->implode('');

            $user = $request->user();
            $existingOTP = $user->otp;
            if(!$existingOTP) return redirect()->route('verify');
            if($existingOTP !=$otp){
                return redirect()->back()->withErrors(['code' => 'Oops! That OTP doesn’t match. Please try again']);
            }

            if($user->otp_expired < now()){
                return redirect()->back()->withErrors(['code' => 'The OTP has expired. Please request a new one.']);
            }
         
            $user->update([
                'email_verified_at'=> Carbon::now(),
                'verififed_via'    => User::VERIFY_VIA_EMAIL,
            ]);
            return redirect('dashboard');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['code' => 'Oops! Something wnet wrong!']);
        }
    }

    public function resendOTP(Request $request)
    {
        try{
            if(!$request->user()) throw new Error("Failed to send the OTP code!");
            $otp = $this->generateOTP(6, true);
            sendMailOTPJob::dispatch($request->user()->email, "Sir/Madam",  $otp);
            $request->user()->update([
                'otp' => $otp,
                'otp_expired' => Carbon::now()->addMinutes(5),
            ]);
            return back()->with('success', 'OTP code has been resend!');
        }catch(\Exception $e){
            return back()->withErrors(['code' => 'Failed to send the OTP code!']);
        }
        
    }


    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email', 'exists:users,email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
