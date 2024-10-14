<?php

namespace Database\Seeders;

use App\Models\Slot;
use App\Models\Shift;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // /* -------------------------------------------------------------------------- */
        // /*                                   for day                                  */
        // /* -------------------------------------------------------------------------- */

        // // Define the start and end times in 24-hour format
        // $start_time = strtotime('6:00 AM');
        // $end_time = strtotime('5:00 PM');

        // // Calculate the number of intervals
        // $interval_minutes = 30;
        // $time_difference_minutes = ($end_time - $start_time) / 60;
        // $number_of_intervals = $time_difference_minutes / $interval_minutes;

        // // Create an array of intervals

        // for ($i = 0; $i < $number_of_intervals; $i++) {
        //     $interval_start = date('g:i A', $start_time + $i * $interval_minutes * 60);
        //     $interval_end = date('g:i A', $start_time + ($i + 1) * $interval_minutes * 60);

        //     Slot::create([
        //         'group_id' => $i,
        //         'from' => $interval_start,
        //         'to' => $interval_end,
        //         'duration' => 30,
        //         'shift_id' => 1,
        //     ]);
        // }


        // /* -------------------------------------------------------------------------- */
        // /*                                  for night                                 */
        // /* -------------------------------------------------------------------------- */
        // // Define the start and end times in 24-hour format
        // $start_time_night = strtotime('5:00 PM');
        // $end_time_night = strtotime('6:00 AM');

        // // Calculate the number of intervals
        // // $interval_minutes = 30;
        // $time_difference_minutes_night = ($end_time_night - $start_time_night) / 60;
        // $number_of_intervals_night = $time_difference_minutes_night / $interval_minutes;

        // // Create an array of intervals

        // for ($i = 0; $i < $number_of_intervals_night; $i++) {
        //     $interval_start_night = date('g:i A', $start_time_night + $i * $interval_minutes * 60);
        //     $interval_end_night = date('g:i A', $start_time_night + ($i + 1) * $interval_minutes * 60);

        //     Slot::create([
        //         'group_id' => $i,
        //         'from' => $interval_start_night,
        //         'to' => $interval_end_night,
        //         'duration' => 30,
        //         'shift_id' => 2,
        //     ]);
        // }

        $slots = [
            [
                'from' => "06:00 AM",
                'to' => "06:30 AM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "06:30 AM",
                'to' => "07:00 AM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "07:00 AM",
                'to' => "07:30 AM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "07:30 AM",
                'to' => "08:00 AM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "08:00 AM",
                'to' => "08:30 AM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "08:30 AM",
                'to' => "09:00 AM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "09:00 AM",
                'to' => "09:30 AM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "09:30 AM",
                'to' => "10:00 AM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "10:00 AM",
                'to' => "10:30 AM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "10:30 AM",
                'to' => "11:00 AM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "11:00 AM",
                'to' => "11:30 AM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "11:30 AM",
                'to' => "12:00 PM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "12:00 PM",
                'to' => "12:30 PM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "12:30 PM",
                'to' => "01:00 PM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "01:00 PM",
                'to' => "01:30 PM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "01:30 PM",
                'to' => "02:00 PM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "02:00 PM",
                'to' => "02:30 PM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "02:30 PM",
                'to' => "03:00 PM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "03:00 PM",
                'to' => "03:30 PM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "03:30 PM",
                'to' => "04:00 PM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "04:00 PM",
                'to' => "04:30 PM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "04:30 PM",
                'to' => "05:00 PM",
                'duration' => 30,
                'shift_id' => 1,
            ],
            [
                'from' => "05:00 PM",
                'to' => "05:30 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "05:30 PM",
                'to' => "06:00 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "06:00 PM",
                'to' => "06:30 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "06:30 PM",
                'to' => "07:00 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "07:00 PM",
                'to' => "07:30 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "07:30 PM",
                'to' => "08:00 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "08:00 PM",
                'to' => "08:30 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "08:30 PM",
                'to' => "09:00 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "09:00 PM",
                'to' => "09:30 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "09:30 PM",
                'to' => "10:00 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "10:00 PM",
                'to' => "10:30 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "10:30 PM",
                'to' => "11:00 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "11:00 PM",
                'to' => "11:30 PM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "11:30 PM",
                'to' => "12:00 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "12:00 AM",
                'to' => "12:30 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "12:30 AM",
                'to' => "01:00 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "01:00 AM",
                'to' => "01:30 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "01:30 AM",
                'to' => "02:00 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "02:00 AM",
                'to' => "02:30 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "02:30 AM",
                'to' => "03:00 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "03:00 AM",
                'to' => "03:30 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "03:30 AM",
                'to' => "04:00 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "04:00 AM",
                'to' => "04:30 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "04:30 AM",
                'to' => "05:00 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "05:00 AM",
                'to' => "05:30 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
            [
                'from' => "05:30 AM",
                'to' => "06:00 AM",
                'duration' => 30,
                'shift_id' => 2,
            ],
        ];
        foreach ($slots as $slot) {
            Slot::create([
                'from' => $slot['from'],
                'to' => $slot['to'],
                'duration' => 30,
                'shift_id' => $slot['shift_id'],
            ]);
        }
    }
}