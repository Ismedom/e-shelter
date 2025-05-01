<?php

namespace App\Http\Controllers\Api\Booking\Auth;

use App\Supports\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{

    public $auth;
    use ApiResponse;

    public function __construct(){
        $this->auth = app(\App\Actions\Auth\Create::class);
    }

    public function signUp(SignUpRequest $request){
       try{
        $user = $this->auth->create([
            ...$request->validated(),
            'user_type'=> User::TYPE_GUEST_USER,
            'role'     => User::GUEST,
            'status'   => User::STATUS_ACTIVE
        ]);
        if(empty($user)) return $this->error('Unable to create user', 500);
        // $user->assignRole(User::GUEST);
        $token = $user->createToken('auth_token', ['*'], now()->addDays(30))->plainTextToken;
        return $this->success([
            'user'  => $user,
            'token' => $token
        ]);
       }catch(\Exception $e){
            return $this->error('Sign Up unsuccessfully!', 500);
       }
    }

    public function signIn(SignInRequest $request){
        try{
            $credential = [
                'email'   => trim($request->email),
                'password'=> trim($request->password),
            ];
            if (Auth::attempt($credential)) {
                $token = $request->user()->createToken('auth_token', ['*'], now()->addDays(30))->plainTextToken;
                return $this->success([
                    'user'  => $request->user()->only('id', 'first_name', 'last_name', 'email'),
                    'token' => $token
                ]);
            }
        }catch(\Exception $e){
            return $this->error('Sign In unsuccessfully!', 500);
        } 
    }

    public function signOut(Request $request){
        try{
            $request->user()->currentToken()->delete();
            return $this->success('Sign Out successfully!');
        }catch(\Exception $e){
            return $this->error('Sign Out unsuccessfully!', 500);
        }
    }
}
