<?php

namespace App\Listeners;

use App\Mail\RegisteredData;
use Illuminate\Support\Facades\Mail;
use App\Events\RegistrationWasStored;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRegisteredData
{
    /**
     * Handle the event.
     *
     * @param  RegistrationWasStored  $event
     * @return void
     */
    public function handle(RegistrationWasStored $event)
    {
        Mail::to($event->data)->queue(
            new RegisteredData($event->data)
        );
    }
}
