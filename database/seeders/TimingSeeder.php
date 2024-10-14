<?php

namespace Database\Seeders;

use App\Models\Turf;
use App\Models\Timing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $turf = Turf::first();
        if ($turf) {

            Timing::create([
                'shift_id' => 1,
                'duration' => 60,
                'amount' => 1000,
                'turf_id' => 1
            ]);
            Timing::create([
                'shift_id' => 1,
                'duration' => 90,
                'amount' => 2000,
                'turf_id' => 1
            ]);
        }
    }
}