<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
class Guest extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (!empty(Auth::guard('customer')->user())) {
            return redirect()->route('home');
        } else
            return $next($request);
    }
}
