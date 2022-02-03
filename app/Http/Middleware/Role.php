<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;

class Role extends Middleware
{
    public function handle($request, Closure $next, ... $roles)
    {
        if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
            return redirect('admin/login');
            
        $arr = explode('/', url()->current());
        $user = Auth::user();
        
        if($user->user_type == 'admin'){
            return $next($request);
        }
        if($user->user_type == 'user'){
            if(in_array('user', $arr))
            {
                return redirect('admin/login');
            }
        }
        
        return redirect('admin/login');
    }
}
