<?php

namespace App\Http\Middleware;

use Closure;
use View;

class Auth
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
        if(!$request->session()->has('Admin_info')){
            return redirect()->intended('/Admin/login');
        }else{
            View::share('Admin_info',$request->session()->get('Admin_info'));
        }
        return $next($request);
    }
}
