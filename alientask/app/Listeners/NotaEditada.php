<?php

namespace App\Listeners;

use App\Events\CrudEvent;
use App\Models\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotaEditada
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
     * @param  \App\Events\CrudEvent  $event
     * @return void
     */
    public function handle(CrudEvent $event)
    {
        $user = $event->user;
        $log = new Log();
        $log->action = $event->action;
        $log->type = $event->type;
        $log->type_title = $event->type_title;
        $log->user_id = $user->id;
        $log->save();
        $user->notas_editadas++;
        $user->save();
    }
}
