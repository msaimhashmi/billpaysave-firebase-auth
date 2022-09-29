<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckAuthenticateLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->type == 'admin'){
                return redirect()->route('admin.user.index');
            }else{
                return redirect()->route('user.dashboard');
            }
        }
        return $next($request);
        // return route('login');
        // return redirect()->to(route('login'))->with('errors', 'You do not have access!');
    }
}
