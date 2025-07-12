<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Mini CRM Lead Tracker API",
 *     description="Documentação da API do Mini CRM Lead Tracker",
 *     @OA\Contact(
 *         name="Tiago Luvizoto Neves",
 *         email="contato@tlndesign.com.br"
 *     )
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000",
 *     description="Servidor Local"
 * )
 *
 * @OA\Server(
 *     url="https://crm.tlndesign.com.br",
 *     description="Servidor Produção"
 * )
 */
class SwaggerController extends Controller
{
    // Apenas para anotações do Swagger
}
