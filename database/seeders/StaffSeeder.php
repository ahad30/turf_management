<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Staff;
use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Staff::create([
                'branch_id' => Branch::inRandomOrder()->first()->id,
                'user_id' => User::where('user_type', 'staff')->inRandomOrder()->first()->id,
            ]);
        }
    }
}