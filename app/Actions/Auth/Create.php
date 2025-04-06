<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Create
{
    public function create($data)
    {
        $user = User::create([
            'email' => trim($data['email']),
            'password' => Hash::make(trim($data['password'])),
            'user_type'=> User::HOTEL_USER,
            'role'     => User::HOTEL_OWNER,
            'status'   => User::STATUS_DRAFT
        ]);
        return $user;
    }
    public function update(){

    }
}