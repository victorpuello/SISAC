<?php

namespace ATS\Http\Middleware;

use ATS\Clases\Estudiante\CurrentObservaciones;
use ATS\Events\CrearObservacionesEvent;
use Closure;

class VerifyObservacions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $observaciones = (new CurrentObservaciones($request->estudiante))->countObservaciones();
        if ($observaciones === 0){
            event(new CrearObservacionesEvent($request->estudiante));
        }
        return $next($request);
    }
}
