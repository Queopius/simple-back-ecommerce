<?php

namespace App\Listeners\User;

use App\Events\User\RegisteredUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\User\PleaseConfirmYourEmail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailVerificationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(RegisteredUser $event)
    {
        Mail::to($event->user)->send(new PleaseConfirmYourEmail);
    }
}
