<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAction
{
    public function create(array $data)
    {
        $user = User::create([
            'first_name'=> isset($data['first_name'])?trim($data['first_name']):null,
            'last_name' => isset($data['last_name'])?trim($data['last_name']):null,
            'email'     => trim($data['email']),
            'password'  => Hash::make(trim($data['password'])),
            'user_type' => $data['user_type'],
            'role'      => $data['role'],
            'status'    => $data['status']
        ]);
        return $user;
    }
}