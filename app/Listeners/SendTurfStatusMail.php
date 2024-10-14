<?php

namespace App\Listeners;

use App\Events\TurfStatusEvent;
use App\Models\Turf;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendTurfStatusMail implements ShouldQueue
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
    public function handle(TurfStatusEvent $event): void
    {
        $turf = Turf::find($event->turfId);
        try {
            $turfOwner = User::find($turf->turf_owner_id);

            Mail::send("mail.TurfStatusChangeTemplate", ['turf' => $turf], function ($message) use ($turfOwner) {
                $message->to($turfOwner->email)->subject("Turf Status Notification");
            });
        } catch (\Exception $e) {
            //
        }
    }
}