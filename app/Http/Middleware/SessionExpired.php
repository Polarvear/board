<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionExpired
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() && $request->session()->has('lastActivity')) {
            $lastActivity = $request->session()->get('lastActivity');
            $expiration = config('session.lifetime') * 60;

            if (time() - $lastActivity > $expiration) {
                return redirect()->route('session.expired');
            }
        }

        return $next($request);
    }
}
