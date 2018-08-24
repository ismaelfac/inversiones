<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class PanelAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::guard($guard)->check()){
           $is_admin = auth()->user()->is_admin;
            switch ($is_admin) 
            {
                case ('1'):
                    return response()->view('admin.content');
                    break;
                default:
                    return redirect('/'); 
            }
        }else{
            return redirect('/login');
        }
        return $next($request);
    }
}
