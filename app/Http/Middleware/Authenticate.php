<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // dd($request->expectsJson());
        if (! $request->expectsJson()) {
            if(Auth::check()){
                if(Auth::user()->type == 'admin')
                    return route('admin.login');
                else
                    return route('login');
            }else{
                return route('login');
            }
            // return route('admin.login');
        }
    }
}
