<?php

namespace ATS\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;

class VerifyPeriodo
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
        $periodo = $request->periodo;
        if ($periodo->cierre < Carbon::now()){
            throw new AuthorizationException;
        }
        return $next($request);
    }
}
