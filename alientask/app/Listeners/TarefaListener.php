<?php

namespace App\Listeners;

use App\Events\TarefaConcluidaEvent;
use App\Events\TarefaCriadaEvent;
use App\Events\TarefaEditadaEvent;
use App\Events\TarefaEvent;
use App\Events\TarefaExcluidaEvent;
use App\Models\Log;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

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
        $user = User::findOrFail($event->user->id);

        if($event instanceof TarefaCriadaEvent) {
            Log::create([
                'action' => config('events.criou'),
                'loggable_title' => $event->loggable->titulo,
                'loggable_type' => config('events.tarefa'),
                'loggable_id' => $event->loggable->id,
                'user_id' => $event->user->id
            ]);

            $user->tarefas_criadas++;
            $user->update();
        }

        if($event instanceof TarefaEditadaEvent) {
            Log::create([
                'action' => config('events.editou'),
                'loggable_title' => $event->loggable->titulo,
                'loggable_type' => config('events.tarefa'),
                'loggable_id' => $event->loggable->id,
                'user_id' => $event->user->id
            ]);
            
            $user->tarefas_editadas++;
            $user->update();
        }

        if($event instanceof TarefaExcluidaEvent) {
            Log::create([
                'action' => config('events.excluiu'),
                'loggable_title' => $event->loggable->titulo,
                'loggable_type' => config('events.tarefa'),
                'loggable_id' => $event->loggable->id,
                'user_id' => $event->user->id
            ]);

            $user->tarefas_excluidas++;
            $user->update();
        }

        if($event instanceof TarefaConcluidaEvent) {
            Log::create([
                'action' => config('events.concluiu'),
                'loggable_title' => $event->loggable->titulo,
                'loggable_type' => config('events.tarefa'),
                'loggable_id' => $event->loggable->id,
                'user_id' => $event->user->id
            ]);

            $user->tarefas_concluidas++;
            $user->update();
        }
    }
}
