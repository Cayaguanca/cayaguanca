<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return $next($request);
            } else {
                //$message = Session::flash('message', 'Acceso denegado')
                return response()->json([
                    'status' => 403,
                    'message' => 'Acceso denegado'
                ], 403);
            }
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'No autorizado'
            ]);
        }
        return $next($request);
    }
}
