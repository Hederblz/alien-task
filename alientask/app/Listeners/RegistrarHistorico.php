<?php

namespace App\Listeners;

use App\Events\UserEvent;
use App\Models\Historico;
use App\Models\Nota;
use App\Models\Tarefa;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegistrarHistorico
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
        $type = '';

        if($event->registravel instanceof Tarefa)
        {
            $type = 'tarefa';
        }
        else if($event->registravel instanceof Nota)
        {
            $type = 'nota';
        }
        else
        {
            $type = 'marcador';
        }

        Historico::create([
            'user_id' => $event->user->id,
            'acao' => $event->action,
            'registravel_id' => $event->registravel->id,
            'registravel_type' => $type,
        ]);
    }
}
