<?php

namespace App\Http\Middleware;

use Closure;

class academy
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
        if(Auth::check() && Auth::user()->type === 'academy')
        {
            return $next($request);
        }
        return redirect()->route('login')->with('error' ,'inssuffiecnt persmission');
    }
}
