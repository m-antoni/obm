<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsVerified
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
        if(auth()->check()){
            if(auth()->user()->isVerified){
                return $next($request);
            }
        }

        // Auth::guard('web')->logout();
        return redirect()->route('verify.sms');
    }
}
