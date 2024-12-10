<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isAuthenticated = Auth::check() || Auth::guard('google')->check();

        // Put in session
        Session::put('is_authenticated', $isAuthenticated);

        // Put in view
        View::share('isAuthenticated', $isAuthenticated);

        return $next($request);
    }
}
