<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Jobs\sendMailOTPJob;
use App\Models\User;
use App\Supports\OTPGenerate;
use Carbon\Carbon;
use Error;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    use OTPGenerate;
    use AuthorizesRequests;

    public $auth;
    public $businessInformation;
    public $businessOwner;

    public function __construct(){
        $this->auth = app(\App\Actions\UserAction::class);
        $this->businessInformation = app(\App\Actions\BusinessInformationAction::class);
        $this->businessOwner = app(\App\Actions\BusinessOwnerAction::class);
    }

    public function showRegisterForm(){
        return view('auth.register');
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack(){
       try{
           $profile = Socialite::driver('google')->stateless()->user();
            $existingUser = User::where('email', $profile->getEmail())->first();
            if ($existingUser) {
                Auth::login($existingUser);
                return redirect()->route('dashboard.index');
            }else{
                $fullName = $profile->getName();
                $firstName = explode(' ', $fullName)[0] ?? null;
                $lastName = explode(' ', $fullName)[1] ?? null;
                $user = User::create([
                    'first_name'=> $firstName,
                    'last_name' => $lastName,
                    'email' => $profile->getEmail(),
                    'password' => Hash::make($profile->id),
                    'user_type' => User::TYPE_HOTEL_USER,
                    'role' => User::HOTEL_OWNER,
                    'status' => User::STATUS_ACTIVE,
                    'email_verified_at' => Carbon::now(),
                    'verififed_via' => User::VERIFY_VIA_GOOGLE,
                ]);
                Auth::login($user);
                return redirect()->route('dashboard.index');
            }
       }catch(\Exception $e){
            return redirect()->route('login')->withErrors(['google' => 'Failed to login with Google. Please try again.']);
       }
    }

    public function register(SignUpRequest $request)
    {
        DB::beginTransaction();
       try{
            $user = $this->auth->create([
                ...$request->validated(),
                'user_type'=> User::TYPE_HOTEL_USER,
                'role'     => User::HOTEL_OWNER,
                'status'   => User::STATUS_DRAFT
            ]);
            $this->businessInformation->createWithNullInformation([
                'business_owner_id' => $user->id,
            ]);
            $this->businessOwner->createWithNullInformation([
                'user_id' => $user->id,
            ]);
            Auth::login($user);
            if(config('help.dev_mode.enabled')){
                $user->update([
                    'email_verified_at'=> Carbon::now(),
                    'verififed_via'    => User::VERIFY_VIA_EMAIL,
                ]);
                DB::commit();     
                return redirect()->route('dashboard.index');           
            }else{
                $otp_code = $this->generateOTP(6, true);
                sendMailOTPJob::dispatch($user->email, "Sir/Madam",  $otp_code);
                $user->update([
                    'otp' => $otp_code,
                    'otp_expired' => Carbon::now()->addMinutes(5),]);
                DB::commit();
                return redirect()->route('verify');
            }
       }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('');
       }
    }

    public function verifyEmail()
    {
        return view('verify.hotel-owner');
    }

    public function verifyEmailOTP(Request $request)
    {
        try{
            $codes = collect(range(1, 6))->mapWithKeys(fn($i) => ["code_$i" => 'required|numeric']);
            $request->validate($codes->toArray());
            $otp  = collect(range(1, 6))->map(fn($i) => $request->input("code_$i"))->implode('');
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
            return redirect()->route('dashboard.index');
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
        return view('auth.login');
    }

    public function login(SignInRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
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
    

