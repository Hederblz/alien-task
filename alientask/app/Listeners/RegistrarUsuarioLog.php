<?php

namespace App\Listeners;

use App\Events\UsuarioEvent;
use App\Models\Log;
use App\Models\Nota;
use App\Models\Tarefa;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegistrarUsuarioLog
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
     * @param  \App\Events\UsuarioEvent  $event
     * @return void
     */
    public function handle(UsuarioEvent $event)
    {
        //
        $type = '';

        if ($event->loggable instanceof Tarefa) {
            $type = 'Tarefa';
        } else if ($event->loggable instanceof Nota) {
            $type = 'Nota';
        }

        Log::create([
            'user_id' => $event->user->id,
            'action' => $event->action,
            'loggable_id' => $event->loggable->id,
            'loggable_type' => $type
        ]);
    }
}
