<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "branch_id" => Branch::inRandomOrder()->first()->id,
            "name" => fake()->name(),
            "color" => fake()->colorName(),
            "price" => fake()->numberBetween(1000, 10000),
            "size" => fake()->randomElement(["S", "M", "L", "XL"]),
            "quantity" => fake()->numberBetween(1, 100),
            "image" => fake()->imageUrl(),
        ];
    }
}