<?php

namespace ATS\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;

class Secretaria
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
        if (! $request->user()->isSecretaria()){
            throw new AuthorizationException;
        }
        return $next($request);
    }
}
