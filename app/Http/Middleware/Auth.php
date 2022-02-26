<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as oAuth;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->guest()) {
            return redirect()->route('auth.login');
        }
        if(auth()->check() && oAuth::user()['role'] == 'ROLE_USER') {
            return $next($request);
        }
        return back();
    }
}
