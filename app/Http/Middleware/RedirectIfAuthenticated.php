<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {   
      
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }
             
        return $next($request);
      
    }
}


/* THIS METHOD IS FOR SOCIAL MEDIA REDIRECT*/

// if(session()->get("url.intended")){
//     session()->put("redirect_after_email_verification", session()->get("url.intended"));
// }

// if (Auth::guard($guard)->check()) {
            
//     return redirect()->intended();
// }



// if (Auth::guard($guard)->check()) {
//     return redirect('/admin');
// }

// switch ($guard) {
//     case 'admin':
//         // check if guard is an admin
//         if(Auth::guard($guard)->check()){
            
//             return redirect()->route('admin.dashboard');
//         }

//         break;
    
//     default:
//         // check if guard is user
//         if (Auth::guard($guard)->check()) {
            
//             return redirect()->intended();
//         }
//         break;
// }
// continue with the request
//return $next($request);