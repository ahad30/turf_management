<?php

namespace App\Services;

use Exception;
use App\Models\Timing;

class DefinePackageGroupByForSlot
{
    public function define($packageId)
    {
        // for shift 
        if ($packageId == 0 || $packageId == 1 || $packageId == 2) {
            $shift = 1; //shift 1 = day
        } else {
            $shift = 2; //shift 2 = night
        }

        if ($packageId == 0 || $packageId == 3) {
            $groupBy = 2; // 2 for 1 hour duration
        } else if ($packageId == 1 || $packageId == 4) {
            $groupBy = 3; // 3 for 1.5 hour duration
        } else {
            $groupBy = 4; // 4 for 2 hours duration
        }

        return [$shift, $groupBy];
    }
}
