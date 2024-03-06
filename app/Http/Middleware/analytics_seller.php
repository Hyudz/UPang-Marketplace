<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class analytics_seller
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
        if (auth()->guest()) {
            return redirect()->route('login');
        }
        else if(auth()->user()->user_type != 'seller') {
            return redirect()->route('product');
        }
        return $next($request);
    }
}
