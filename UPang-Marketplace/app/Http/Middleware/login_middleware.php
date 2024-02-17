<?php

namespace App\Http\Middleware;

use App\Models\products;
use Closure;
use Illuminate\Http\Request;

class login_middleware
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
        if(auth()->guest()) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
