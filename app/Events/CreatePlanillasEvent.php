<?php

namespace ATS\Events;

use ATS\Model\Docente;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CreatePlanillasEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $docente;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Docente $docente)
    {
        $this->docente = $docente;
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
