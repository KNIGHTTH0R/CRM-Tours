<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Agent
{

    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->is_agent )
        {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
