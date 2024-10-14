<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewTurfRegisterRequest;
use App\Models\NewTurfRegister;
use Illuminate\Http\Request;

class NewTurfRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turfRequests = NewTurfRegister::orderBy('status', 'asc')
            ->orderBy('updated_at', 'asc')
            ->paginate(20);
        return view("admin.new_turf_register.new_turf_register", ['turfRequests' => $turfRequests]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(NewTurfRegisterRequest $request)
    {
        NewTurfRegister::create($request->validated());
        return redirect()->back()->with("success", "Submitted Successfully");
    }
    public function show()
    {
        //
    }
    public function update(NewTurfRegister $newTurfRegister, $id)
    {
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewTurfRegister $newTurfRegister, $id)
    {

        $newTurfRegister->find($id)->delete();
        return redirect()->back()->with("success", "Deleted Successfully");
    }
    public function RegistrationStatus($id)
    {
        NewTurfRegister::find($id)->update(['status' => 1]);
        return back()->with('success', 'Registration Request Readed');
    }
}
