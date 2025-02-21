<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in and has the 'admin' role.
        // If you're using Spatie, this assumes your User model uses the HasRoles trait.
        if (!$request->user() || !$request->user()->hasRole('admin')) {
            // You can redirect to a "not authorized" page, dashboard, or back.
            return redirect()->route('dashboard')->with('error', 'You do not have administrative access.');
        }

        return $next($request);
    }
}
