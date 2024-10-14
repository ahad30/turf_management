<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            City::create([
                'name' => fake()->unique()->randomElement(['GEC', 'Boddarhat', 'new market', 'Agrabad', 'Patiya', 'Boalkhali', 'Roujan', 'Oxygen', 'Muradpur', 'Chadgon']),
            ]);
        }
    }
}