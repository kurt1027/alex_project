<?php

namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Closure;
use Auth;

class Admin
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
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Company') {
            return $next($request);
        }

        return back();
    }
}
