<?php

namespace App\Http\Controllers\TurfOwner;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StaffRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffUpdateRequest;
use App\Models\Branch;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id', auth()->id())->first();
        if (!$user) {
            Session::flash("warning", "User does not exist");
            return back();
        }

        $branches = $user->branches;
        if (count($branches) < 1) {
            Session::flash("error", "Create a Branch First");
            return redirect()->route('turf-owner.branches.create');
        }
        $query = Staff::latest();
        foreach ($branches as $item) {
            $query->orWhere('branch_id', $item->id);
        }
        $staffs = $query->paginate(20);

        return view('TurfOwner.staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('id', auth()->id())->first();
        if (!$user) {
            Session::flash("warning", "User does not exist");
            return back();
        }
        $branches = Branch::where("branch_owner_id", $user->id)->get(['id', 'name']);
        return view('TurfOwner.staffs.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'status' => $request->status,
                    'password' => Hash::make($request->password),
                    'user_type' => 'staff'
                ]
            );

            if (!$user) {
                Session::flash("warning", "User Not found");
                return back();
            }
            Staff::create([
                'branch_id' => $request->branch_id,
                'user_id' => $user->id,
            ]);
            DB::commit();

            Session::flash("success", "Staff successfully created");
            return back();
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash("warning", "Something went wrong");
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = Staff::find($id);
        if (!$staff) {
            Session::flash("warning", "Staff does not exist");
            return back();
        }

        $user = $staff->user;
        if (!$user) {
            Session::flash("warning", "User does not exist");
            return back();
        }

        $branches = Branch::where("branch_owner_id", auth()->id())->get(['id', 'name']);
        return view('TurfOwner.staffs.edit', compact(['staff', 'user', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffUpdateRequest $request, $id)
    {
        $staff = Staff::find($id);
        if (!$staff) {
            Session::flash("warning", "Staff does not exist");
            return back();
        }

        DB::beginTransaction();
        try {
            if ($request->branch_id) {
                $staff->update([
                    'branch_id' => $request->branch_id
                ]);
            }

            $staff->user->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'status' => $request->status,
            ]);
            DB::commit();

            Session::flash('success', 'Successfully updated');
            return back();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        if (!$staff) {
            Session::flash("warning", "Staff does not exist");
            return back();
        }

        try {
            $staff->user->delete();

            Session::flash("success", "Staff successfully deleted");
            return back();
        } catch (Exception $e) {
            Session::flash("warning", "Something went wrong");
            return back();
        }
    }
}
