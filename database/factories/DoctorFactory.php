<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'phone' =>fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'nik' =>fake()->unique()->randomNumber(8, false),
            'sip' =>fake()->randomNumber(8),
            'pid' =>fake()->unique()->randomNumber(3, false),
            'sid' =>'1',
            'status'=> fake()->boolean()
        ];
    }
}
