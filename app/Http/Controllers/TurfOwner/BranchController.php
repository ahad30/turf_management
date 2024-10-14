<?php

namespace App\Http\Controllers\TurfOwner;

use App\Models\City;
use App\Models\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use Illuminate\Support\Facades\Session;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::where('branch_owner_id', auth()->id())->with('city')->latest()->paginate(20);
        return view('TurfOwner.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::orderBy('name')->get();
        return view('TurfOwner.branches.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchRequest $request)
    {
        try {
            Branch::create($request->validated() + ['branch_owner_id' => auth()->id()]);
            Session::flash('success', 'Branches successfully created.');
            return back();
        } catch (\Throwable $th) {
            Session::flash('warning', 'Something went wrong');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch = Branch::find($id);
        $cities = City::orderBy('name')->get();
        return view('TurfOwner.branches.edit', compact(['branch', 'cities']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchRequest $request, string $id)
    {
        Branch::where('id', $id)->update($request->validated());
        session()->flash('success', 'Branch successfully updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            Session::flash('warning', 'Branch not found');
            return back();
        }
        $branch->delete();
        session()->flash('success', 'Branch successfully deleted');
        return back();
    }
}
