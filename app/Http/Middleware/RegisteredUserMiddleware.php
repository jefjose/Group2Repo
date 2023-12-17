<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisteredUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if ($user && $user->is_admin === 0) {
            return $next($request); // Allow authenticated users with is_admin === 0
        }

        return redirect('/')->with('error', "An Error Occured"); // Redirect guests and non-registered users
    }
}
