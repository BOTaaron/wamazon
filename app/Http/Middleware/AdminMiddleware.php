<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the role_id of 1 (Administrator)
        if (Auth::check() && Auth::user()->role_id == 1) {
            return $next($request);
        }

        // Redirect to homepage if not an administrator
        return redirect('/');
    }
}
