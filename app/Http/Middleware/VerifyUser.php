<?php

namespace ATS\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class VerifyUser
{

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next)
    {
        if ($request->user->id <> Auth::user()->id){
            throw new AuthorizationException;
        }
        return $next($request);
    }
}
