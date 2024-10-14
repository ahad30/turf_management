<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrachTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {



        for ($i = 0; $i < 50; $i++) {
            $cityId = City::inRandomOrder()->first()->id;
            Branch::create([
                "name" => fake()->unique()->city(),
                "branch_owner_id" => User::inRandomOrder()->first()->id,
                "city_id" => $cityId
            ]);
        }
    }
}