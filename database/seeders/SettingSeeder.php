<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Settings Table Seeder
        Setting::create([
            'turf_activation_fee' => 2000,
            'facebook_link' => "https://www.facebook.com/",
        ]);
    }
}
