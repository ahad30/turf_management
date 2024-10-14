<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StaffTurfHandleController extends Controller
{
    // index
    public function index()
    {
        $staff = Staff::where('user_id', auth()->user()->id)->first();
        if (!$staff) {
            Session::flash('warning', 'Staff not found');
            return back();
        }
        $branch = $staff->branch;
        if (!$branch) {
            Session::flash('warning', 'Branch not found');
            return back();
        }
        $my_turfs = $branch->turfs;
        if (!$my_turfs) {
            Session::flash('warning', 'Turf not found');
            return back();
        }
        return view('turfStaff.myTurf.index', compact('my_turfs'));
    }
}
