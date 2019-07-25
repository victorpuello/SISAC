<?php

namespace ATS\Events;

use ATS\Model\Estudiante;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CrearObservacionesEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Estudiante
     */
    public $estudiante;

    /**
     * CrearObservacionesEvent constructor.
     * @param Estudiante $estudiante
     */
    public function __construct(Estudiante $estudiante)
    {
        $this->estudiante = $estudiante;
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
