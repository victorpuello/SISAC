<?php

namespace ATS\Listeners;

use ATS\Clases\CurrentPeriodo;
use ATS\Events\CrearObservacionesEvent;
use ATS\Model\Aspecto;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CrearObservacionesListener
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
    public function handle(CrearObservacionesEvent $event)
    {
        $aspectos = Aspecto::all();
        $estudiante = $event->estudiante;
        $periodo = (new CurrentPeriodo())->getPeriodo();
        foreach ($aspectos as $aspecto){
            $estudiante->observaciones()->create([
                'aspecto_id' => $aspecto->id,
                'estudiante_id' => $estudiante->id,
                'periodo_id' => $periodo->id,
                'valoracion' => 'S'
            ]);
        }
    }
//['aspecto_id','estudiante_id','periodo_id','valoracion']
}
