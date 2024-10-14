<?php

namespace App\Http\Controllers\TurfOwner;

use App\Events\BookingStatusEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Turf;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;

class TurfBookingHandleController extends Controller
{
    // On Hold
    public function onHold()
    {
        $turfs = Turf::where('turf_owner_id', auth()->id())->get();

        $query = Booking::latest();
        foreach ($turfs as $item) {
            $query->orWhere('turf_id', $item->id)->where('status', 0);
        }
        $bookings =  $query->paginate(20);

        return view("TurfOwner.booking.index", compact("bookings"));
    }

    // Paid
    public function Paid()
    {
        $turfs = Turf::where('turf_owner_id', auth()->id())->get();

        $query = Booking::latest();
        foreach ($turfs as $item) {
            $booking =  $query->orWhere('turf_id', $item->id)->where('status', 1);
        }
        $bookings =  $query->paginate(20);

        return view("TurfOwner.booking.index", compact("bookings"));
    }

    // Completed
    public function Complete()
    {
        $turfs = Turf::where('turf_owner_id', auth()->id())->get();

        $query = Booking::latest();
        foreach ($turfs as $item) {
            $booking =  $query->orWhere('turf_id', $item->id)->where('status', 2);
        }
        $bookings =  $query->paginate(20);

        return view("TurfOwner.booking.index", compact("bookings"));
    }

    // Canceled
    public function Cancel()
    {
        $turfs = Turf::where('turf_owner_id', auth()->id())->get();

        $query = Booking::latest();
        foreach ($turfs as $item) {
            $booking =  $query->orWhere('turf_id', $item->id)->where('status', 3);
        }
        $bookings =  $query->paginate(20);

        return view("TurfOwner.booking.index", compact("bookings"));
    }

    // Edit Booking
    public function EditBooking($id)
    {
        $booking = Booking::findOrFail($id);
        if (!$booking) {
            Session::flash("warning", "This Booking is not available");
            return back();
        }
        return view("TurfOwner.booking.edit", compact("booking"));
    }

    // Update Booking
    public function UpdateBooking(UpdateBookingRequest $request, $id)
    {
        $booking = Booking::findOrFail($id);
        if (!$booking) {
            Session::flash("warning", "This Booking is not available");
            return back();
        }

        $booking->update($request->only('amount', 'due_amount', 'status', 'playing_status'));

        // Send email notification
        Event::dispatch(new BookingStatusEvent($booking->id));

        Session::flash("success", "Booking details successfully updated");
        return back();
    }

    // Cancel Booking
    public function CancelBooking($id)
    {
        $booking = Booking::findOrFail($id);
        if (!$booking) {
            Session::flash("warning", "This Booking is not available");
            return back();
        }

        $booking->update(['status' => 3]);

        // Send email notification
        Event::dispatch(new BookingStatusEvent($booking->id));

        Session::flash("success", "Booking successfully cancelled");
        return redirect()->route('turf-owner.onHoldTurfBooking');
    }
}
