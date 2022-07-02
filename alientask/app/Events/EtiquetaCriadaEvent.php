<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EtiquetaCriadaEvent extends EtiquetaEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $type_title;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $type_title)
    {
        parent::__construct($user);
        $this->type_title = $type_title;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
