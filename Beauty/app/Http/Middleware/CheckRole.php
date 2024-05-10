<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // Redirect unauthenticated users to the login page
            return redirect('/login');
        }

        $user = Auth::user();

        // Log the user's role and the required role
        Log::info('User Role: ' . $user->role . ', Required Role: ' . $role);

        // Check if the user has the required role
        if ($user->isAdmin()) {
            return $next($request);
        }

        // If user is not an admin, log and redirect or display an error message
        Log::info('Unauthorized access for user: ' . $user->id);

        return redirect('/')->with('error', 'Unauthorized access');
    }
}
