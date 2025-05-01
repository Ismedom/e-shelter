<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => fake()->name(),
            'first_name'         => fake()->firstName(),
            'last_name'          => fake()->lastName(),
            'role'               => User::HOTEL_OWNER, 
            'user_type'          => 'internal',
            'status'             => 'active',
            'otp_expired'        => now()->addMinutes(10),
            'otp'                => fake()->randomNumber(6),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'verififed_via'      => 'email',
            'password' => static::$password ??= Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
