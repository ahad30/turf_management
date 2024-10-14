<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StaffStoreHandleController extends Controller
{
    // index
    public function index()
    {
        $staff = Staff::where('user_id', auth()->id())->first();
        if (!$staff) {
            Session::flash('warning', 'Staff not found');
            return back();
        }

        $branch = $staff->branch;
        if (!$branch) {
            Session::flash('warning', 'Turf not found');
            return back();
        }

        $products = Product::where('branch_id', $branch->id)->latest()->paginate(20);
        if (!$products) {
            Session::flash('warning', 'Products not found');
            return back();
        }

        return view('turfStaff.products.index', compact('products'));
    }
}
