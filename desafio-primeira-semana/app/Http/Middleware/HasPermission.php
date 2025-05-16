<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Enums\PermissionLevel;

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
        $requiredEnums = array_map(fn($permission)=>PermissionLevel::fromName($permission), $requiredLevels );
        //função anonima transforma cada item de requiredLevels em um enum com a função FromName e salva em um array;
        if(!in_array($user->permission_level,  $requiredEnums)){//verifica se a permissao do usuario esta no array de permissoes passado;
            return redirect()->route('home')->with('error', 'Acesso negado.');
        }
        return $next($request);
    }
}
