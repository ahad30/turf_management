<?php

namespace App\Services;

use Exception;
use App\Models\Timing;

class GeneratePackages
{
    public function generate($request, $turf)
    {
        try {
            // For day
            Timing::create([
                'duration' => 60,
                'amount' => $request['price_for_60_minutes_at_day'],
                'shift_id' => 1,
                'turf_id' => $turf->id
            ]);
            Timing::create([
                'duration' => 90,
                'amount' => $request['price_for_90_minutes_at_day'],
                'shift_id' => 1,
                'turf_id' => $turf->id
            ]);
            Timing::create([
                'duration' => 120,
                'amount' => $request['price_for_120_minutes_at_day'],
                'shift_id' => 1,
                'turf_id' => $turf->id
            ]);
            // For night
            Timing::create([
                'duration' => 60,
                'amount' => $request['price_for_60_minutes_at_night'],
                'shift_id' => 2,
                'turf_id' => $turf->id
            ]);
            Timing::create([
                'duration' => 90,
                'amount' => $request['price_for_90_minutes_at_night'],
                'shift_id' => 2,
                'turf_id' => $turf->id
            ]);
            Timing::create([
                'duration' => 120,
                'amount' => $request['price_for_120_minutes_at_night'],
                'shift_id' => 2,
                'turf_id' => $turf->id
            ]);
            return 1;
        } catch (Exception $e) {
            // throw new Exception('Could not generate');
            // throw new Exception($e->getMessage());
        }
        return -1;
    }
}