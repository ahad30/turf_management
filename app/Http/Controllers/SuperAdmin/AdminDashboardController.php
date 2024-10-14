<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Turf;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentForTurfBooking;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $totalTurf = Turf::count();
        $turfOwner = User::where('user_type', 'turf_owner')->count();
        $totalPayment = PaymentForTurfBooking::sum('paid_amount'); //which payment is accepted
        $newTurf = Turf::where('status', 2)->count();
        $activeTurf = Turf::with('status', 1)->count();
        $inactiveTurf = Turf::where('status', 0)->count();
        return view(
            "admin.dashboard",
            [
                'totalTurf' => $totalTurf,
                'turfOwner' => $turfOwner,
                'totalPayment' => $totalPayment,
                'newTurf' => $newTurf,
                'activeTurf' => $activeTurf,
                'inactiveTurf' => $inactiveTurf,
            ]
        );
    }
}
