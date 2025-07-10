<?php

namespace App\Events;

use App\Models\Lead;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LeadMovedEvent
{
    use Dispatchable, SerializesModels;

    public Lead $lead;
    public int $fromStageId;
    public int $toStageId;
    public int $userId;

    public function __construct(Lead $lead, int $fromStageId, int $toStageId, int $userId)
    {
        $this->lead = $lead;
        $this->fromStageId = $fromStageId;
        $this->toStageId = $toStageId;
        $this->userId = $userId;
    }
}
