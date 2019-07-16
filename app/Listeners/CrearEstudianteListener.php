<?php

namespace ATS\Listeners;

use ATS\Clases\Planilla\ResetPlanilla;
use ATS\Events\CrearEstudianteEvent;
use ATS\Model\Asignacion;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CrearEstudianteListener
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
     * @param CrearEstudianteEvent $event
     */
    public function handle(CrearEstudianteEvent $event)
    {
        $estudiante = $event->estudiante;
        $asignaciones = Asignacion::where('grupo_id','=',$estudiante->grupo->id)->get();
        foreach ($asignaciones as $asignacion){
            $planillas = $asignacion->planillas;
            foreach ($planillas as $planilla){
                $reset = new ResetPlanilla($planilla);
                $reset->reset();
            }

        }
    }
}
