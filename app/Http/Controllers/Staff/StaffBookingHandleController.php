<?php

namespace App\Http\Controllers\Staff;

use App\Events\BookingStatusEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookingRequest;
use App\Http\Requests\VerificationBookingRequest;
use App\Models\Booking;
use App\Models\PaymentForTurfBooking;
use App\Models\Staff;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class StaffBookingHandleController extends Controller
{
    // Pending Booking
    public function PendingBooking()
    {
        $staff = Staff::where('user_id', auth()->user()->id)->first();
        if (!$staff) {
            Session::flash('warning', 'Staff not found');
            return back();
        }
        $branch = $staff->branch;
        if (!$branch) {
            Session::flash('warning', 'Branch not found');
            return back();
        }
        $my_turfs = $branch->turfs;
        if (!$my_turfs) {
            Session::flash('warning', 'Turf not found');
            return back();
        }

        $query = Booking::latest();
        foreach ($my_turfs as $item) {
            $query->orWhere('turf_id', $item->id)->where('status', 0);
        }
        $bookings = $query->paginate(20);

        return view('turfStaff.booking.index', compact('bookings'));
    }

    // Completed Booking
    public function CompletedBooking()
    {
        $staff = Staff::where('user_id', auth()->user()->id)->first();
        if (!$staff) {
            Session::flash('warning', 'Staff not found');
            return back();
        }
        $branch = $staff->branch;
        if (!$branch) {
            Session::flash('warning', 'Branch not found');
            return back();
        }
        $my_turfs = $branch->turfs;
        if (!$my_turfs) {
            Session::flash('warning', 'Turf not found');
            return back();
        }

        $query = Booking::latest();
        foreach ($my_turfs as $item) {
            $query->orWhere('turf_id', $item->id)->where('status', 2);
        }
        $bookings = $query->paginate(20);

        return view('turfStaff.booking.index', compact('bookings'));
    }

    // Edit Booking Details
    public function EditBookingDetails($id, $payment_id)
    {
        $booking = Booking::findOrFail($id);
        if (!$booking) {
            Session::flash('warning', 'No Booking details found');
            return back();
        }

        $transaction = PaymentForTurfBooking::find($payment_id);
        if (!$transaction) {
            Session::flash('warning', 'No Payment details found');
            return back();
        }

        return view('turfStaff.booking.edit', compact([
            'booking',
            'transaction',
        ]));
    }

    // Verify Booking Handle
    public function VerifyBookingHandle()
    {
        return view('turfStaff.booking.verify');
    }


    // Verification Booking
    public function VerificationBooking(VerificationBookingRequest $request)
    {
        $booking = Booking::where('book_uid', $request->book_uid)->first();
        if (!$booking) {
            Session::flash('warning', 'No Booking details found');
            return back();
        }

        $transaction = PaymentForTurfBooking::where('transaction_code', $request->transaction_code)->orWhere('id', $booking->id)->first();
        if (!$transaction) {
            Session::flash('warning', 'No Payment details found');
            return back();
        }

        return view('turfStaff.booking.edit', compact([
            'booking',
            'transaction',
        ]));
    }

    // Update Booking Details
    public function UpdateBookingDetails(UpdateBookingRequest $request, $id, $payment_id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            Session::flash('warning', 'No Booking details found');
            return back();
        }
        $payment = PaymentForTurfBooking::find($payment_id);
        if (!$payment) {
            Session::flash('warning', 'No Payment details found');
            return back();
        }

        try {
            if ($request->status == 2) {
                if ($payment->due_amount != null && $payment->total_amount == $payment->paid_amount) {

                    $payment->update([
                        'paid_amount' => $request->paid_amount,
                        'due_amount' => $request->due_amount,
                        'payment_status' => $request->status,
                    ]);

                    $booking->update($request->only('status', 'playing_status'));
                }
                Session::flash("warning", "Complete your payment.");
                return back();
            }
            $payment->update([
                'paid_amount' => $request->paid_amount,
                'due_amount' => $request->due_amount,
                'payment_status' => $request->status,
            ]);
            $booking->update($request->only('status', 'playing_status'));

            // Send email notification
            Event::dispatch(new BookingStatusEvent($booking->id));

            Session::flash("success", "Booking details successfully updated");
            return back();
        } catch (\Exception $e) {
            Session::flash('warning', $e->getMessage());
            return back();
        }
    }
}
