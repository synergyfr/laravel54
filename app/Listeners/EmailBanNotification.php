<?php

namespace App\Listeners;

use App\Events\UserWasBanned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
// use Example/AppMailer;

class EmailBanNotification implements ShouldQueue
{

    // use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() // AppMailer $mailer - object injecting typehint
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasBanned  $event
     * @return void
     */
    public function handle(UserWasBanned $event)
    {
        // $this->mailer->sendBanNotification;
        // Mail::send();
        var_dump('Notify ' . $event->user->name . ' that they have been banned from the site.');

    }
}
