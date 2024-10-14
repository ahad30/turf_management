<?php

namespace App\Listeners;

use App\Events\BookingStatusEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;

class SendBookingStatusMail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookingStatusEvent $event): void
    {
        try {
            $booking = Booking::find($event->bookingID)->toArray();
            Mail::send("mail.StatusChangeTemplate", $booking, function ($message) use ($booking) {
                $message->to($booking['customer_email'])->subject("Booking Status");
            });
        } catch (\Exception $e) {
            $booking = null;
        }
    }
}
