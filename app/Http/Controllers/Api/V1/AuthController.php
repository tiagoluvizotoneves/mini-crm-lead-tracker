<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use OpenApi\Annotations as OA;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/v1/login",
     *     summary="Autenticação de usuário",
     *     tags={"Autenticação"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", example="admin@crm.com"),
     *             @OA\Property(property="password", type="string", example="123456")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Login bem-sucedido",
     *         @OA\JsonContent(
     *             @OA\Property(property="accessToken", type="string", example="token")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Credenciais inválidas"
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Usuário inativo ou sem empresa"
     *     )
     * )
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['mensagem' => 'Credenciais inválidas.'], 401);
        }

        if (!$user->is_active) {
            return response()->json(['mensagem' => 'Usuário inativo.'], 403);
        }

        if (!$user->company_id) {
            return response()->json(['mensagem' => 'Usuário não vinculado a nenhuma empresa.'], 403);
        }

        $token = $user->createToken('access_token')->plainTextToken;

        return response()->json(['accessToken' => $token]);
    }
}
