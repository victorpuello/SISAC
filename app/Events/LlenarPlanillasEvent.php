<?php

namespace ATS\Events;

use ATS\Model\Planilla;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LlenarPlanillasEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Planilla
     */
    public $planilla;


    /**
     * LlenarPlanillasEvent constructor.
     * @param Planilla $planilla
     */
    public function __construct(Planilla $planilla)
    {
        $this->planilla = $planilla;
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
