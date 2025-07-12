<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCompanyIsValid
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user || !$user->is_active) {
            return response()->json(['mensagem' => 'Usuário inativo.'], 403);
        }

        if (!$user->company_id) {
            return response()->json(['mensagem' => 'Usuário não vinculado a nenhuma empresa.'], 403);
        }

        return $next($request);
    }
}
