<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (auth()->user()->user_type == 'admin') {
                    return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
                } else if (auth()->user()->user_type == 'turf_owner') {
                    return redirect()->intended(RouteServiceProvider::TURF_OWNER_HOME);
                } else {
                    return redirect()->intended(RouteServiceProvider::STAFF_HOME);
                }
            }
        }

        return $next($request);
    }
}