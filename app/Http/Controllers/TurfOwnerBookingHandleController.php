<?php

namespace App\Http\Controllers;

use App\Events\BookingStatusEvent;
use App\Http\Requests\UpdateBookingRequest;
use App\Http\Requests\VerificationBookingRequest;
use App\Models\Booking;
use App\Models\PaymentForTurfBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;

class TurfOwnerBookingHandleController extends Controller
{
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

        $transaction = PaymentForTurfBooking::where('transaction_code', $request->transaction_code)->orWhere('book_uid', $booking->book_uid)->first();
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
