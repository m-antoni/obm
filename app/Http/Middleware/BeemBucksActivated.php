<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class BeemBucksActivated
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
         // return dd(auth()->user()->getFullNameAttribute());   
         $user = DB::table('users')
                        ->where('id', auth()->user()->id)
                        ->where('beem_activation', false)
                        ->first();
     
         if($user){

            return redirect()->route('create_beem')
                             ->with('Info', 'Register your Card and Avail Beem Bucks account.');
         }  
           
        return $next($request);
        
    }
}
