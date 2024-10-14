<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turf>
 */
class TurfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $turfTypes = ['football', 'cricket', 'basketball', 'volleyball', 'golf'];
        return [
            'turf_owner_id' => 3,
            'branch_id' => Branch::inRandomOrder()->first()->id,
            'city_id' => City::inRandomOrder()->first()->id,
            'turf_name' => fake()->name(),
            'unique_code' => fake()->unique()->randomNumber(),
            'size' => fake()->randomNumber(),
            'turf_type' => $turfTypes[array_rand($turfTypes)],
            'location' => fake()->city(),
            'thumbnail' => 'https://plus.unsplash.com/premium_photo-1661912014730-cb332faa85ad?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fHR1cmZ8ZW58MHx8MHx8fDA%3D',
            'status' => 1,
            'description' => fake()->paragraph(),
            'bank_name' => 'Bkash',
            'account_holder_name' => fake()->name(),
            'account_type' => fake()->randomElement(['personal', 'saving']),
            'account_number' => fake()->randomNumber(),
            'qr_code' => 'https://plus.unsplash.com/premium_photo-1661912014730-cb332faa85ad?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fHR1cmZ8ZW58MHx8MHx8fDA%3D',
            'phone' => fake()->phoneNumber(),
        ];
    }
}
