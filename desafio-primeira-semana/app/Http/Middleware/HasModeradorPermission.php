<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Auth;


class HasModeradorPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(in_array(Auth::user()->permission_level,[1,2])){
            return $next($request);
        }
        return redirect('/');
    }   
     
}

