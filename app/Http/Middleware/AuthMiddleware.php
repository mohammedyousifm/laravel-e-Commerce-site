<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            // Redirect to login if not authenticated
            return redirect()->route('login.index');
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check user role and route access
        if ($user->position == 'admin' && $request->route()->getName() == 'home.index') {
            // If user is admin trying to access home.index, deny access
            abort(403, 'Unauthorized');
        } elseif ($user->position == 'customer' && $request->route()->getName() == 'dashboard.index') {
            // If user is customer trying to access dashboard.index, deny access
            abort(403, 'Unauthorized');
        }

        // Allow access to other routes
        return $next($request);
    }
}
