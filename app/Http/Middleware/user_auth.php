<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class user_auth
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
        if(!$request->session()->has('user_id')){
            $request->session()->flash('auth','Acess Denied');
            return redirect('/login');
        }
        return $next($request);
    }
}
