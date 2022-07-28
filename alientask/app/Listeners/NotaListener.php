<?php

namespace App\Listeners;

use App\Events\NotaCriadaEvent;
use App\Events\NotaEditadaEvent;
use App\Events\NotaEvent;
use App\Events\NotaExcluidaEvent;
use App\Models\Log;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotaListener
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
    public function handle(NotaEvent $event)
    {
        $user = User::findOrFail($event->user->id);

        if($event instanceof NotaCriadaEvent) {
            Log::create([
                'action' => config('events.criou'),
                'loggable_title' => $event->loggable->titulo,
                'loggable_type' => config('events.nota'),
                'loggable_id' => $event->loggable->id,
                'user_id' => $event->user->id
            ]);

            $user->notas_criadas++;
            $user->update();
        }

        if($event instanceof NotaEditadaEvent) {
            Log::create([
                'action' => config('events.editou'),
                'loggable_title' => $event->loggable->titulo,
                'loggable_type' => config('events.nota'),
                'loggable_id' => $event->loggable->id,
                'user_id' => $event->user->id
            ]);

            $user->notas_editadas++;
            $user->update();
        }

        if($event instanceof NotaExcluidaEvent) {
            Log::create([
                'action' => config('events.excluiu'),
                'loggable_title' => $event->loggable->titulo,
                'loggable_type' => config('events.nota'),
                'loggable_id' => $event->loggable->id,
                'user_id' => $event->user->id
            ]);

            $user->notas_excluidas++;
            $user->update();
        }
    }
}
