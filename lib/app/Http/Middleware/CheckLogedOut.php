<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLogedOut
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
        if(Auth::guest()){
            return redirect()->intended(url('login'));
        }else{
            if(Auth::user()->level == 1){
                return redirect()->intended(url('home'));
            }
        }
        return $next($request);
    }
}
