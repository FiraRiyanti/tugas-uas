<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CekLogin
{
    public function handle($request, Closure $next)
    {
        if (!Session::get('login')) {
            return redirect('/login');
        }
        return $next($request);
    }
}
