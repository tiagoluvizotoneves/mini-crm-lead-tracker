<?php

namespace App\Services;

use App\Models\KanbanStage;

class KanbanStageService
{
    public function list()
    {
        return KanbanStage::with('company')->orderBy('position')->get();
    }

    public function create(array $data): KanbanStage
    {
        return KanbanStage::create($data);
    }

    public function update(int $id, array $data): KanbanStage
    {
        $stage = KanbanStage::findOrFail($id);
        $stage->update($data);
        return $stage;
    }

    public function delete(int $id): void
    {
        KanbanStage::findOrFail($id)->delete();
    }
}
