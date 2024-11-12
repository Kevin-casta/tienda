<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\RoleHelper;
use Illuminate\Support\Facades\Auth;

class AuthorizedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission=null): Response
    {
        // Validar si hay sesión
        if (!Auth::check()) {

            return redirect()->route('login');
        }

        if(!empty($permission)) {

            $isAuthorized = RoleHelper::isAuthorized($permission);

            if (!$isAuthorized) {

                abort(403, 'No hay autorización');
            }
        }

        return $next($request);
    }

}
