<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\AdminFollowup;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminMail
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
     * @param  \App\Events\UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        //perfom more actions(if need be)

        Mail::to('admin-mail')->send(new AdminFollowup());
    }
}
