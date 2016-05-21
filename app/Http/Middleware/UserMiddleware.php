<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Support\Facades\Auth;
use Auth;

class UserMiddleware
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
        
        if(Auth::user()->user_type_id==1)
        {
            return redirect()->route('tk.index');
        }
        return $next($request);
    }
}
