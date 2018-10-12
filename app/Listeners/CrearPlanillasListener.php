<?php

namespace ATS\Listeners;

use ATS\Clases\Estudiante\VerificadorNotas;
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
        $planilla = $event->planilla;
        if (! $planilla->cargada){
            $verificador = new VerificadorNotas($planilla);
//            dd($verificador->foundIndicador());
            $verificador->foundIndicador();
            $planilla->update(['cargada'=>1]);
        }
    }
}
