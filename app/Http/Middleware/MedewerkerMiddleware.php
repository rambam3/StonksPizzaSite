<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MedewerkerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol === 'medewerker') {
            return $next($request);
        } else {
            if (Auth::check() && Auth::user()->rol === 'klant') {
                return redirect()->route('home');
            } else {
                return redirect()->route('login');
        }
        }
    }
}
