<?php

namespace App\Jobs;

use App\Models\Turf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class StatusUpdateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $turfs = Turf::get(['id', 'activated_at', 'deactivated_at']);

        foreach ($turfs as $item) {
            if ($item->deactivated_at != Null) {
                $deactivated_at = $item->deactivated_at;
                $today = date('Y-m-d');

                if ($today > $deactivated_at) {
                    $turf = Turf::find($item->id);
                    $turf->status = 2; // This will set the status On Hold
                    $turf->save();
                }
            }
        }
    }
}
