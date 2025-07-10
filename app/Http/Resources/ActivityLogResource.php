<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityLogResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => $this->user->name ?? null,
            'fromStage' => $this->fromStage->name ?? null,
            'toStage' => $this->toStage->name ?? null,
            'message' => $this->message,
            'createdAt' => $this->created_at,
        ];
    }
}
