<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use Illuminate\Support\Facades\Session;
use App\Models\Shift;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::latest()->paginate(10);
        return view("admin.shift.index", compact("shifts"));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shift = Shift::findOrFail($id);
        if (!$shift) {
            Session::flash("warning", "Shift not found");
            return back();
        }
        return view("admin.shift.edit", compact("shift"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShiftRequest $request, $id)
    {
        $shift = Shift::findOrFail($id);
        if (!$shift) {
            Session::flash("warning", "Shift not found");
            return back();
        }
        $shift->update($request->all());
        Session::flash("success", "Shift successfully updated");
        return back();
    }


}
