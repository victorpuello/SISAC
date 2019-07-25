<?php

namespace ATS\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;

class VerifyPlanilla
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next)
    {
        $planilla = $request->planilla;
        $docente = $request->user()->docente;

        if ( $docente->id <> $planilla->asignacion->docente->id){
            throw new AuthorizationException;
        }
        return $next($request);
    }
}
