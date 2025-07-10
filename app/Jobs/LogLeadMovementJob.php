<?php

namespace App\Jobs;

use App\Models\ActivityLog;
use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LogLeadMovementJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Lead $lead;
    protected int $fromStageId;
    protected int $toStageId;
    protected int $userId;

    public function __construct(Lead $lead, int $fromStageId, int $toStageId, int $userId)
    {
        $this->lead = $lead;
        $this->fromStageId = $fromStageId;
        $this->toStageId = $toStageId;
        $this->userId = $userId;
    }

    public function handle(): void
    {
        ActivityLog::create([
            'lead_id' => $this->lead->id,
            'user_id' => $this->userId,
            'from_stage_id' => $this->fromStageId,
            'to_stage_id' => $this->toStageId,
            'message' => 'Lead movido de estágio.'
        ]);
    }
}
