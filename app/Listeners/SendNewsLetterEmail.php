<?php

namespace App\Listeners;

use App\Events\NewsLetterEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\NewsLetterEmail as MailNewsLetterEmail;
use App\Models\subscriber;

class SendNewsLetterEmail
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
    public function handle(NewsLetterEmail $event): void
    {
        
        $subscribers = subscriber::get()->pluck('email');
        foreach($subscribers as $email)
        {
            Mail::to($email)->send(new MailNewsLetterEmail($event->book));
        }    
    }
}
