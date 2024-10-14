<?php
namespace App\Services;


class CalculateSlots
{
    public function collect($selected_time)
    {
        $slots = [];
        foreach ($selected_time as $slot) {
            $slotsArray = json_decode($slot, true);
            $slots = [...$slots, ...$slotsArray];
        }

        return ($slots);
    }
}
