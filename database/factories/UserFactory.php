<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'              => $this->faker->name(),
            'first_name'            => $this->faker->firstname(),
            'last_name'             => $this->faker->lastname(),
            'email'                 => $this->faker->unique()->safeEmail(),
            'email_verified_at'     => now(),
            'password'              => Hash::make('password'), // password
            'remember_token'        => Str::random(10),
            'created_at'            => now()->subDays(rand(1, 120)),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
