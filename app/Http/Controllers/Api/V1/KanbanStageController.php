<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKanbanStageRequest;
use App\Http\Requests\UpdateKanbanStageRequest;
use App\Http\Resources\KanbanStageResource;
use App\Services\KanbanStageService;
use Illuminate\Http\Request;

class KanbanStageController extends Controller
{
    protected KanbanStageService $kanbanStageService;

    public function __construct(KanbanStageService $kanbanStageService)
    {
        $this->kanbanStageService = $kanbanStageService;
    }

    public function index()
    {
        $stages = $this->kanbanStageService->list();
        return KanbanStageResource::collection($stages);
    }

    public function store(StoreKanbanStageRequest $request)
    {
        $stage = $this->kanbanStageService->create($request->validated());
        return new KanbanStageResource($stage);
    }

    public function update(UpdateKanbanStageRequest $request, int $id)
    {
        $stage = $this->kanbanStageService->update($id, $request->validated());
        return new KanbanStageResource($stage);
    }

    public function destroy(int $id)
    {
        $this->kanbanStageService->delete($id);
        return response()->json(['mensagem' => 'Estágio removido com sucesso.']);
    }
}
