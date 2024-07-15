<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;

class EnsureEmailIsVerified
{
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (!$request->user() || !$request->user()->hasVerifiedEmail()) {
            return $request->expectsJson()
                        ? abort(403, 'Tu correo electrónico no está verificado.')
                        : Redirect::route($redirectToRoute ?: 'verificar.index') ;
        }

        return $next($request);
    }
}
