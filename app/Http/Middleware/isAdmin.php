<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has the "administrator" role
        if (auth()->check() && auth()->user()->role_id === '1') {
            return $next($request);
        }

        // Redirect or perform actions if the user is not an administrator
        return redirect('/store'); // You can change the redirect URL
    }
}
