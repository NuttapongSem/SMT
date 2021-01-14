<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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
        $user = Auth::user();
        
        if( $user && $user->type === 1 ) {
          
            return $next($request);
        } else {
            
            Session::flash("error", "ไปล็อกอินดิ!!เห้ย");
            return redirect('/login');
            // abort(403, 'Unauthorized action.');
        }
    }
}
