<?php

namespace App\Http\Controllers\TurfOwner;

use App\Models\Turf;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class TurfOwnerDashboardController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->user()->id;
        $totalBranch = Branch::where('branch_owner_id', $userId)->count();
        $totalTurf = Turf::where('turf_owner_id', $userId)->count();

        $my_turfs = Turf::where('turf_owner_id', $userId)->get();
        $query = Booking::latest()->get(['id', 'turf_id', 'status']);
        foreach ($my_turfs as $item) {
            $query->where('turf_id', $item->id);
        }
        $totalPendingBooking = $query->where('status', 0)->count(); // total pending bookings get by akram vai
        $query2 = Booking::latest()->get(['id', 'turf_id', 'status']);
        foreach ($my_turfs as $item) {
            $query2->where('turf_id', $item->id);
        }
        $totalBooking = $query2->where('status', 2)->count();
        return view(
            "TurfOwner.dashboard",
            [
                'totalBranch' => $totalBranch,
                'totalTurf' => $totalTurf,
                'totalPendingBooking' => $totalPendingBooking,
                'totalBooking' => $totalBooking,
            ]
        );
    }
}