<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class usertype
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
        if (Auth::user()->user_type!=2) {
            return view('notAllowed',['reason'=>'usertype']);
        }
        return $next($request);
    }
}
