<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\LeadController;
use App\Http\Controllers\Api\V1\KanbanStageController;
use App\Http\Controllers\Api\V1\ActivityLogController;

Route::prefix('v1')->group(function () {

    // Login público
    Route::post('/login', [AuthController::class, 'login']);

    // Rotas protegidas com Sanctum + multitenancy
    Route::middleware(['auth:sanctum', 'company.valid'])->group(function () {
        Route::get('/usuario-logado', fn() => response()->json(auth()->user()));

        Route::put('leads/{id}/move', [LeadController::class, 'move']);
        Route::get('leads/{id}/logs', [ActivityLogController::class, 'index']);
        Route::apiResource('kanban-stages', KanbanStageController::class)->except(['show']);
    });
});
