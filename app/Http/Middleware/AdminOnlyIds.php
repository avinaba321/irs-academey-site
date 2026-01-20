<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminOnlyIds
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ✅ Only check admin guard
        if (!Auth::guard('admin')->check()) {
            abort(403, 'Unauthorized Access');
        }

        $allowedIds = [2];

        $admin = Auth::guard('admin')->user();

        if (!in_array($admin->id, $allowedIds)) {
            return redirect('/')
                ->withErrors(['email' => 'You are not allowed to access admin dashboard'])
                ->with('login_error', true);
        }

        return $next($request);
    }
}
