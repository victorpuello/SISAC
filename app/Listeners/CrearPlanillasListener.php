<?php

namespace ATS\Listeners;

use ATS\Events\LlenarPlanillasEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CrearPlanillasListener
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
    public function handle(LlenarPlanillasEvent $event)
    {
        if (isset($event->planilla)){
            $planilla = $event->planilla;
            $planilla->load('');
        }
    }
}
