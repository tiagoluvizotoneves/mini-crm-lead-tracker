<?php

use App\Http\Controllers\Api\V1\ActivityLogController;
use App\Http\Controllers\Api\V1\KanbanStageController;
use App\Http\Controllers\Api\V1\LeadController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    // outras rotas
    Route::put('leads/{id}/move', [LeadController::class, 'move']);

    Route::get('leads/{id}/logs', [ActivityLogController::class, 'index']);

    Route::apiResource('kanban-stages', KanbanStageController::class)->except(['show']);
});
