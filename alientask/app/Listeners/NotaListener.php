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
        $user = $event->user;
        if($event instanceof NotaCriadaEvent) {
            Log::create([
                'action' => config('events.criou'),
                'type' => config('events.nota'),
                'type_title' => $event->type_title,
                'user_id' => $user->id
            ]);
            $user->notas_criadas++;
            $user->save();
        }

        if ($event instanceOf NotaEditadaEvent) {
            Log::create([
                'action' => config('events.editou'),
                'type' => config('events.nota'),
                'type_title' => $event->type_title,
                'user_id' => $user->id
            ]);
            $user->notas_editadas++;
            $user->save();
        }

        if($event instanceof NotaExcluidaEvent) {
            Log::create([
                'action' => config('events.excluiu'),
                'type' => config('events.nota'),
                'type_title' => $event->type_title,
                'user_id' => $user->id
            ]);
            $user->notas_excluidas++;
            $user->save();
        }
        
    }
}
