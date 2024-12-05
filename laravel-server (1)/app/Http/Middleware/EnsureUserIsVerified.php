<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::check() && Auth::user()->status !== 'verified') {
            return redirect()->route('verify')->withErrors(['error' => 'Please verify your account first.']);
        }

        // If the user is not authenticated, redirect them to the login page
        if (Auth::guest()) {
            return redirect()->route('signin'); // Change 'login' to your custom route
        }

        return $next($request);
    }
    
}
