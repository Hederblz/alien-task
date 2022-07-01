<?php

namespace App\Listeners;

use App\Events\NotaCriadaEvent;
use App\Events\NotaEditadaEvent;
use App\Events\NotaEvent;
use App\Events\NotaExcluidaEvent;
use App\Models\Log;
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
     * @param  \App\Events\NotaEvent  $event
     * @return void
     */
    public function handle(NotaEvent $event)
    {
        
        if($event instanceof NotaCriadaEvent) {
            $user = $event->user;
            Log::create([
                'action' => 'criou',
                'type' => $event->type,
                'type_title' => $event->type_title,
                'user_id' => $user->id
            ]);
            $user->notas_criadas++;
            $user->save();
        }

        if ($event instanceOf NotaEditadaEvent) {
            $user = $event->user;
            Log::create([
                'action' => 'editou',
                'type' => $event->type,
                'type_title' => $event->type_title,
                'user_id' => $user->id
            ]);
            $user->notas_editadas++;
            $user->save();
        }

        if($event instanceof NotaExcluidaEvent) {
            $user = $event->user;
            Log::create([
                'action' => 'excluiu',
                'type' => $event->type,
                'type_title' => $event->type_title,
                'user_id' => $user->id
            ]);
            $user->notas_excluidas++;
            $user->save();
        }
        
    }
}
