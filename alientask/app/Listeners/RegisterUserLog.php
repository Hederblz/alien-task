<?php

namespace App\Listeners;

use App\Events\UserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterUserLog
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
     * @param  \App\Events\UserEvent  $event
     * @return void
     */
    public function handle(UserEvent $event)
    {
        //
        $user = $event->user;
        if ($event->action == 'nota_criada') {
            $user->notas_criadas++;
        }
        // $action = $event->action;

        // $user->name = $user->name . $action;
        $user->save();
    }
}
