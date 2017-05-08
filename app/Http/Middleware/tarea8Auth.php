<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class tarea8Auth
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
        if (Auth::user()->user_type!=3) {
            return view('notAllowed',['reason'=>'usertype']);
        }
        return $next($request);
    }
}
