<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\City;
use App\Models\Turf;
use App\Models\Shift;
use App\Models\Branch;
use Illuminate\Support\Str;
use App\Services\GeneratePackages;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTurfRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateTurfRequest;
use App\Traits\ImageTrait;

class TurfController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_turfs = Turf::where('turf_owner_id', auth()->id())->latest()->paginate(10);

        return view('TurfOwner.turfs.index', compact(['my_turfs']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::orderBy('name', 'asc')->get();
        $branches = Branch::where('branch_owner_id', auth()->id())->get();

        $shifts = Shift::all();
        return view('TurfOwner.turfs.create', [
            'cities' => $cities,
            'branches' => $branches,
            'shifts' => $shifts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTurfRequest $request)
    {

        DB::beginTransaction();
        try {

            $turfData = [
                'turf_owner_id' => auth()->id(),
                'map_iframe' => $request->map_iframe,
                'map_url' => $request->map_url,
                'turf_name' => Str::lower($request->turf_name),
                'unique_code' => Str::random(1, 9),
                'thumbnail' => $this->imageUpload($request, "thumbnail", "/uploads/Turf/thumbnail"),
                'qr_code' => $this->imageUpload($request, "qr_code", "/uploads/Turf/QrCode"),
                'images' => $this->multipleImageUpload($request, "images", "/uploads/Turf/Images"),
            ];

            // return $turfData;
            $turf = Turf::create(array_merge($request->all(), $turfData));
            DB::table('turfs')->where('id', $turf->id)->update(['images' => $turfData['images']]);

            // Generate packages and pricing  for turf
            $generator = new GeneratePackages();
            $package = $generator->generate($request->validated(), $turf);

            if ($package) {
                DB::commit();
                session()->flash('success', 'Turf successfully created.');
                return redirect()->route('turf-owner.my-turfs.index');
            } else {
                throw new Exception('Could not generate');
            }
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('warning', 'Oops! Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $turf = Turf::findOrFail($id);
        if (!$turf) {
            Session::flash('error', 'Turf not found');
            return back();
        }

        $cities = City::orderBy('name', 'asc')->get();
        $branches = Branch::where('branch_owner_id', auth()->id())->get();

        $shifts = Shift::all();
        return view('TurfOwner.turfs.edit', [
            'turf' => $turf,
            'cities' => $cities,
            'branches' => $branches,
            'shifts' => $shifts
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTurfRequest $request, $id)
    {
        $turf = Turf::findOrFail($id);
        if (!$turf) {
            Session::flash('error', 'Turf not found');
            return back();
        }

        $turfData = [
            'turf_owner_id' => auth()->id(),
            'map_iframe' => $request->map_iframe,
            'map_url' => $request->map_url,
            'turf_name' => Str::lower($request->turf_name),
            'unique_code' => Str::random(1, 9),
            'thumbnail' => $this->imageUpload($request, "thumbnail", "/uploads/Turf/thumbnail"),
            'qr_code' => $this->imageUpload($request, "qr_code", "/uploads/Turf/QrCode"),
            'images' => $this->multipleImageUpload($request, "images", "/uploads/Turf/Images"),
        ];

        $turf->update(array_merge($request->all(), $turfData));

        Session::flash('success', 'Turf successfully updated');
        return back();
    }
}
