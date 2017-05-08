<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class dataConfirmed
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
        if (Auth::user()->data_confirmed==0) {
            return redirect('/myprofile/editprofile');
        }
        return $next($request);
    }
}
