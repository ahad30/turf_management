<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TurfOwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turf_owners = User::where('user_type', 'turf_owner')->latest()->paginate(20);
        return view('admin.turf_owners.index', compact('turf_owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.turf_owners.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $turf_owner = User::find($id);
        return view('admin.turf_owners.edit', compact('turf_owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            Session::flash('warning', 'User not found');
            return back();
        }

        $request->validate([
            'status' => 'required'
        ]);

        $user->update([
            'status' => $request->status,
        ]);

        Session::flash('success', 'Status successfully changed');
        return back();
    }
}
