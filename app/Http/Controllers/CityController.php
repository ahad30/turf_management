<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::latest()->paginate(3);
        return view('admin.cities.index', [
            'cities' => $cities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        City::create($request->validated());
        session()->flash('success', 'City Created');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::find($id);
        return view('admin.cities.edit', ['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, string $id)
    {
        City::where('id', $id)->update([
            'name' => $request->name
        ]);
        session()->flash('success', 'City Updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branches = Branch::where('city_id', $id)->count();
        if ($branches < 1) {
            $city = City::find($id);
            session()->flash('success', 'Resource deleted successfully');
            $city->delete();
        } else {

            session()->flash('warning', 'Branch exist under this City');
        }
        return redirect()->route('admin.cities.index');
    }
}
