<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Turf;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\SlotSeeder;
use Database\Seeders\TurfSeeder;
use Database\Seeders\ShiftSeeder;
use Database\Seeders\StaffSeeder;
use Database\Seeders\TimingSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\SettingSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\CityTableSeeder;
use Database\Seeders\BrachTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '09290823839',
            'user_type' => 'superadmin',
            'status' => 'Active',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'phone' => '09290823839',
            'user_type' => 'staff',
            'status' => 'Active',
            'password' => Hash::make('password')
        ]);
        User::create([
            'name' => 'Turf Owner',
            'email' => 'turf@gmail.com',
            'phone' => '09290823839',
            'user_type' => 'turf_owner',
            'status' => 'Active',
            'password' => Hash::make('password')
        ]);



        for ($i = 0; $i < 50; $i++) {
            $user_types = ["superadmin", "staff", "turf_owner"];
            \App\Models\User::create([
                'name' => 'Test User' . $i,
                'email' => 'test' . $i . '@example.com',
                'phone' => '09290823839',
                'password' => Hash::make('password'),
                'status' => 'Active',
                'user_type' => $user_types[array_rand($user_types)],
            ]);
        }

        $this->call([
            SettingSeeder::class,
            CityTableSeeder::class,
            ShiftSeeder::class,
            SlotSeeder::class,
            BrachTableSeeder::class,
            TimingSeeder::class,
                // TurfSeeder::class,
            ProductSeeder::class,
            StaffSeeder::class,
        ]);
    }
}