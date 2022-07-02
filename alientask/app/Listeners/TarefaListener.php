<?php

namespace App\Listeners;

use App\Events\TarefaConcluidaEvent;
use App\Events\TarefaCriadaEvent;
use App\Events\TarefaEditadaEvent;
use App\Events\TarefaEvent;
use App\Events\TarefaExcluidaEvent;
use App\Models\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TarefaListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(TarefaEvent $event)
    {
        if($event instanceof TarefaCriadaEvent) {
            $user = $event->user;
            Log::create([
                'action' => config('events.criou'),
                'type' => config('events.tarefa'),
                'type_title' => $event->type_title,
                'user_id' => $event->user->id
            ]);
            $user->tarefas_criadas++;
        }

        if($event instanceof TarefaEditadaEvent) {
            $user = $event->user;
            Log::create([
                'action' => config('events.editou'),
                'type' => config('events.tarefa'),
                'type_title' => $event->type_title,
                'user_id' => $event->user->id
            ]);
            $user->tarefas_editadas++;
        }

        if($event instanceof TarefaExcluidaEvent) {
            $user = $event->user;
            Log::create([
                'action' => config('events.excluiu'),
                'type' => config('events.tarefa'),
                'type_title' => $event->type_title,
                'user_id' => $event->user->id
            ]);
            $user->tarefas_excluidas++;
        }
        
        if($event instanceof TarefaConcluidaEvent) {
            $user = $event->user;
            Log::create([
                'action' => config('events.concluiu'),
                'type' => config('events.tarefa'),
                'type_title' => $event->type_title,
                'user_id' => $event->user->id
            ]);
            $user->tarefas_concluidas++;
        }
    }
}
