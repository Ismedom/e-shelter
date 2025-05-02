<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\OtpMail;

class ForgotPasswordController extends Controller
{
    /**
     * Display forgot password form
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Send OTP to user's email
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'No account found with this email address.'
        ]);

        $token = Str::random(64);
        $otp = random_int(100000, 999999); // 6-digit OTP

        // Store token and OTP in password_resets table
        DB::table('password_resets')->where('email', $request->email)->delete();
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'otp' => $otp,
            'created_at' => Carbon::now()
        ]);

        // Send OTP via email
        Mail::to($request->email)->send(new OtpMail($otp));

        return redirect()->route('password.reset', ['token' => $token])
            ->with('status', 'We have e-mailed your OTP!');
    }

    /**
     * Display OTP verification form
     */
    public function showOtpForm($token)
    {
        $resetRecord = DB::table('password_resets')->where('token', $token)->first();
        
        if (!$resetRecord) {
            return redirect()->route('password.request')
                ->with('error', 'Invalid password reset link or link has expired.');
        }
        
        return view('auth.verify-otp', ['token' => $token]);
    }

    /**
     * Verify OTP
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'otp' => 'required|numeric',
        ]);

        $resetRecord = DB::table('password_resets')
            ->where('token', $request->token)
            ->where('otp', $request->otp)
            ->first();

        if (!$resetRecord) {
            return back()->with('error', 'Invalid OTP.');
        }

        // Check if OTP is expired (15 minutes)
        if (Carbon::parse($resetRecord->created_at)->addMinutes(15)->isPast()) {
            return redirect()->route('password.request')
                ->with('error', 'OTP has expired. Please request a new one.');
        }

        return redirect()->route('password.reset-form', ['token' => $request->token]);
    }

    /**
     * Display password reset form
     */
    public function showResetForm($token)
    {
        $resetRecord = DB::table('password_resets')->where('token', $token)->first();
        
        if (!$resetRecord) {
            return redirect()->route('password.request')
                ->with('error', 'Invalid password reset link or link has expired.');
        }
        
        return view('auth.reset-password', ['token' => $token, 'email' => $resetRecord->email]);
    }

    /**
     * Reset password
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $resetRecord = DB::table('password_resets')
            ->where('token', $request->token)
            ->where('email', $request->email)
            ->first();

        if (!$resetRecord) {
            return redirect()->route('password.request')
                ->with('error', 'Invalid token or email.');
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete password reset record
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')
            ->with('status', 'Your password has been reset successfully!');
    }
}

