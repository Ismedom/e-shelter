<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name'         => 'Test',
            'last_name'          => 'User',
            'role'               => 'admin', 
            'user_type'          => 'internal',
            'status'             => 'active',
            'otp'                => '123456',
            'otp_expired'        => now()->addMinutes(10),
            'email'              => 'test1@example.com',
            'email_verified_at'  => now(),
            'verififed_via'      => 'email',
            'password'           => Hash::make('password'),
            'remember_token'     => Str::random(10),
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);
    }
}
