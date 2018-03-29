<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Session()->has('mail') && !Session()->has('pass')){
            return redirect()->intended('login');
        }
        return $next($request);
    }
}
