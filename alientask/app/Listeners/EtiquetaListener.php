<?php

namespace App\Listeners;

use App\Events\EtiquetaCriadaEvent;
use App\Events\EtiquetaEditadaEvent;
use App\Events\EtiquetaEvent;
use App\Events\EtiquetaExcluidaEvent;
use App\Models\Log;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EtiquetaListener
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
    public function handle(EtiquetaEvent $event)
    {
        $user = User::findOrFail($event->user->id);

        if($event instanceof EtiquetaCriadaEvent) {
            Log::create([
                'action' => config('events.criou'),
                'loggable_title' => $event->loggable->titulo,
                'loggable_type' => config('events.etiqueta'),
                'loggable_id' => $event->loggable->id,
                'user_id' => $event->user->id
            ]);

            $user->etiquetas_criadas++;
            $user->update();
        }

        if($event instanceof EtiquetaEditadaEvent) {
            Log::create([
                'action' => config('events.editou'),
                'loggable_title' => $event->loggable->titulo,
                'loggable_type' => config('events.etiqueta'),
                'loggable_id' => $event->loggable->id,
                'user_id' => $event->user->id
            ]);

            $user->etiquetas_editadas++;
            $user->update();
        }

        if($event instanceof EtiquetaExcluidaEvent) {
            Log::create([
                'action' => config('events.excluiu'),
                'loggable_title' => $event->loggable->titulo,
                'loggable_type' => config('events.etiqueta'),
                'loggable_id' => $event->loggable->id,
                'user_id' => $event->user->id
            ]);

            $user->etiquetas_excluidas++;
            $user->update();
        }
    }
}
