<?php

namespace App\Http\Middleware;

use Closure;

class DriverAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->guard('driver')->check()) {
            return redirect(route('driver.login'));
        }

        return $next($request);
    }
}
