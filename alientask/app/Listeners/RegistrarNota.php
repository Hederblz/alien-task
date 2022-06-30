<?php

namespace App\Listeners;

use App\Events\NotaCriadaEvent;
use App\Models\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegistrarNota
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
     * @param  \App\Events\NotaCriadaEvent  $event
     * @return void
     */
    public function handle(NotaCriadaEvent $event)
    {
        $log = new Log();
        $log->user_id = $event->user;
        $log->action = $event->action;
        $log->loggable_id = $event->nota->id;
        $log->loggable_type = 'nota';
        $log->save();
    }
}
