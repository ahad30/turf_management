<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffDashboardController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->user()->id;
        $staff = Staff::where('user_id', $userId)->first();
        $totalTurfs = $staff->branch->turfs->count();
        $turfs = $staff->branch->turfs;

        $query = Booking::latest()->get(['id', 'turf_id', 'status']);
        foreach ($turfs as $item) {
            $query->where('turf_id', $item->id);
        }
        $totalPB = $query->where('status', 0)->count();
        $completeBooking = Booking::latest()->get(['id', 'turf_id', 'status']);
        foreach ($turfs as $item) {
            $completeBooking->where('turf_id', $item->id);
        }
        $totalCB = $completeBooking->where('status', 2)->count();

        return view("turfStaff.dashboard", compact([
            'totalTurfs',
            'totalPB',
            'totalCB'
        ]));
    }
}
