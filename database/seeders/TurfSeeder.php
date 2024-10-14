<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Turf;
use App\Models\User;
use App\Models\Branch;
use App\Models\Timing;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TurfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // // You can adjust the number of records you want to seed
        // $turf_owner = User::where('user_type', 'turf_owner')->inRandomOrder()->first();
        // $city = City::first();
        // $branch_id = Branch::where('branch_owner_id', $turf_owner)->where('city_id', $city->id)->first();
        // for ($i = 0; $i < 10; $i++) {
        //     if ($branch_id) {
        //         DB::table('turfs')->insert([
        //             'turf_owner_id' => $turf_owner,
        //             'branch_id' => $branch_id,
        //             'city_id' => $city->id,
        //             'title' => $faker->unique()->word,
        //             'unique' => $faker->unique()->word,
        //             'images' => null,
        //             'size' => $faker->word,
        //             'type' => $faker->word,
        //             'contact' => $faker->phoneNumber,
        //             'email' => $faker->email,
        //             'location' => $faker->address,
        //             'description' => $faker->text,
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]);
        //     }
        // }
        for($i=0;$i<36;$i++){
           Turf::factory()->count(1)->create();
           $turf=  Turf::latest()->first();
           // For day
           Timing::create([
            'duration' => 60,
            'amount' => fake()->numberBetween(200,400),
            'shift_id' => 1,
            'turf_id' => $turf->id
        ]);
        Timing::create([
            'duration' => 90,
            'amount' => fake()->numberBetween(200,400),
            'shift_id' => 1,
            'turf_id' => $turf->id
        ]);
        Timing::create([
            'duration' => 120,
            'amount' => fake()->numberBetween(200,400),
            'shift_id' => 1,
            'turf_id' => $turf->id
        ]);
        // For night
        Timing::create([
            'duration' => 60,
            'amount' => fake()->numberBetween(200,400),
            'shift_id' => 2,
            'turf_id' => $turf->id
        ]);
        Timing::create([
            'duration' => 90,
            'amount' => fake()->numberBetween(200,400),
            'shift_id' => 2,
            'turf_id' => $turf->id
        ]);
        Timing::create([
            'duration' => 120,
            'amount' => fake()->numberBetween(200,400),
            'shift_id' => 2,
            'turf_id' => $turf->id
        ]);
        }
    }
}