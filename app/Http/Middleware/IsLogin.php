<?php

namespace App\Http\Middleware;

use Closure;

class IsLogin
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
        if(session()->get('super')){
            return $next($request);
        }else{
            return redirect('admin/login')->with('errors','请先进行正常登录>_<');
        }
    }
}
