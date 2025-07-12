<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleBySlug
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $requiredRole): Response
    {
        $user = $request->user();

        if (! $user || ! $user->role || $user->role->slug !== $requiredRole) {
            return response()->json(['mensagem' => 'Acesso restrito ao perfil: ' . $requiredRole], 403);
        }

        return $next($request);
    }
}
