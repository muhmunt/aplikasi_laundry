<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use App\User;
use Session;

class adminMiddleware
{
    
    public function handle($request, Closure $next)
    {
        // $userID = Auth::user()->id;
        // $user = User::find($userID);

        if(auth()->user()->role != 'admin'){ 
            Session::flash('auth','You are not authorized to view this page.');
            return redirect()->route('home');
        }
            

        // if(Auth::check() && Auth::user()->role !='admin'){
        //     Session::flash('auth','You are not authorized to view this page.');
        //     return redirect()->route('home');
        // }

        return $next($request);
    }
}
