<?php

namespace ATS\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;

class Admin
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
        if (! $request->user()->isAdmin()){
            throw new AuthorizationException;
        }
        return $next($request);
    }
}
