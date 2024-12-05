<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */


    public function handle(Request $request, Closure $next){
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check the user's status
            $user = Auth::user();
            if ($user->status !== 'Active') {
                // Log the user out and redirect to a custom error page or login
                Auth::logout();
                return redirect('/login')->with('error', 'Your account is not active.');
            }
        }

        return $next($request);
    }
}
