<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (empty(Auth::guard('customer')->user())) {
            return redirect()->route('login');
        } else
            return $next($request);
    }
}
