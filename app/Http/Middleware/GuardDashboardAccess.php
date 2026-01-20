<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class GuardDashboardAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$guard): Response
    {
        // ❌ If not logged in with this guard
       
          if (!Auth::guard($guard)->check()) {
            return redirect()->route('home')->with('login_error', true);
        }


        return $next($request);
    }
}
