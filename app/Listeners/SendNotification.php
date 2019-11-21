<?php

namespace App\Listeners;

use App\Events\CreateCompany;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewCompany;

class SendNotification
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
     * @param  CreateCompany  $event
     * @return void
     */
    public function handle(CreateCompany $event)
    {
        $user=\App\User::first();        
        $user->notify(new NewCompany($event->company));
        
    }
}
