<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$requiredLevels): Response

    {
        $user = Auth::user();
        if(!in_array($user-> permission_level->value, array_map('intval', $requiredLevels))){
            return redirect()->route('home')->with('error', 'Acesso negado.');
        }
        return $next($request);
    }
}
