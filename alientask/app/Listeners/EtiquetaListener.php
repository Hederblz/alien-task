<?php

namespace App\Listeners;

use App\Events\EtiquetaCriadaEvent;
use App\Events\EtiquetaEditadaEvent;
use App\Events\EtiquetaEvent;
use App\Events\EtiquetaExcluidaEvent;
use App\Models\Log;
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
        $user = $event->user;

        if($event instanceof EtiquetaCriadaEvent) {
            Log::create([
                'action' => config('events.criou'),
                'type' => config('events.etiqueta'),
                'type_title' => $event->type_title,
                'user_id' => $user->id
            ]);
            $user->etiquetas_criadas++;
            $user->save();
        }

        if($event instanceof EtiquetaEditadaEvent) {
            Log::create([
                'action' => config('events.editou'),
                'type' => config('events.etiqueta'),
                'type_title' => $event->type_title,
                'user_id' => $user->id
            ]);
            $user->etiquetas_editadas++;
            $user->save();
        }

        if($event instanceof EtiquetaExcluidaEvent) {
            Log::create([
                'action' => config('events.excluiu'),
                'type' => config('events.etiqueta'),
                'type_title' => $event->type_title,
                'user_id' => $user->id
            ]);
            $user->etiquetas_excluidas++;
            $user->save();
        }
    }
}
