<?php

namespace App\Http\Middleware;

use Closure;

class adminMiddleware
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

        if(\Auth::guest()){
            return redirect()->back();
        }else{
            if(\Auth::user()->role_id == 2){
                return redirect()->back();
            }
        }

        return $next($request);
    }
}
