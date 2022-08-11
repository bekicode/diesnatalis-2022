<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userRole)
    {
        if($userRole == 'admin') {
            $userRole = 2;
        } else if($userRole == 'juri') {
            $userRole = 1;
        } else {
            $userRole = 0;
        }
        
        if(Auth::user()->role == $userRole) {
            return $next($request);
        }
        return abort(404);
    }
}
