<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewTurfRegisterRequest;
use App\Http\Requests\StoreContactRequest;
use App\Models\Booking;
use App\Models\City;
use App\Models\Contact;
use App\Models\NewTurfRegister;
use App\Models\Setting;
use App\Models\Turf;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     *
     * return welcome page
     *
     */

    public function index(Request $request)
    {
        $cities = City::orderBy('name')->get();
        $matchMakings = Booking::where('status', 2)->where('playing_status', 1)->take(3)->get();
        $bookings = Booking::where('status', 2)->where('playing_status', 1)->get();
        return view('welcome', [
            'cities' => $cities,
            'bookings' => $bookings,
            'matchMakings' => $matchMakings,
        ]);
    }
    /**
     * Turf Details
     *
     */
    public function turfDetails(Request $request, $id)
    {
        $turf = Turf::find($id);

        return view('common.turfDetails', ['turf' => $turf]);
    }
    /**
     *
     * return about page
     *
     */
    public function about()
    {
        return view('common.about');
    }
    /**
     *
     * return contact page
     *
     */
    public function contact()
    {
        return view('common.contact');
    }
    public function matchMaking()
    {
        $matchMakings = Booking::where('status', 2)->where('playing_status', 1)->get();
        return view('match_making.match_making', ['matchMakings' => $matchMakings]);
    }
    public function contactStore(StoreContactRequest $request)
    {
        Contact::create($request->validated());
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully');
    }
    public function newturfregister()
    {
        return view('new_turf_register.new_turf_register');
    }
    public function newTurfRegisterStore(NewTurfRegisterRequest $request)
    {
        NewTurfRegister::create($request->validated());
        return redirect()->back()->with('success', 'Submitted Successfully');
    }
}
