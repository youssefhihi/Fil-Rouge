<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use App\Mail\ReturnReminderEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendReturnReminderEmail implements ShouldQueue
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
        $reservations = Reservation::where('is_taken',true)->where('is_returnd',false)->whereDate('returnDate', Carbon::today())->get();
        foreach ($reservations as $reservation) {
            Mail::to($reservation->client->user->email)->send(new ReturnReminderEmail($reservation->id));
        }

    }
}
