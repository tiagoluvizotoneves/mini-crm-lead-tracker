<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KanbanStageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'companyId' => $this->company_id,
            'name' => $this->name,
            'position' => $this->position,
            'color' => $this->color,
            'createdAt' => $this->created_at,
        ];
    }
}
