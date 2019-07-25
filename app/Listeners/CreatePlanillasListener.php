<?php

namespace ATS\Listeners;

use ATS\Clases\CurrentPeriodo;
use ATS\Events\CreatePlanillasEvent;
use ATS\Model\Planilla;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatePlanillasListener
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
    public function handle(CreatePlanillasEvent $event)
    {
        $docente = $event->docente;
        $periodo = new CurrentPeriodo();
        $planillas = $docente->planillas->where('periodo_id','=',$periodo->getPeriodo()->id);
        if ($planillas->isEmpty()){
            foreach ($docente->asignaciones as $asignacion){
                Planilla::create([
                    'modificada' => false,
                    'periodo_id' => $periodo->getPeriodo()->id,
                    'asignacion_id' => $asignacion->id
                ]);
            }
        }
    }
}
