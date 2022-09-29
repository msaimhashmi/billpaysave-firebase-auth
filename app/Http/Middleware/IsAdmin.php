<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class IsAdmin
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
        if(auth()->user()->type == 'admin')
        {
            return $next($request);
        }

        return redirect(route('user.dashboard'));
        // return redirect()->to(route('user.dashboard'))->with('errors', "You don't have access!");
    }
}
