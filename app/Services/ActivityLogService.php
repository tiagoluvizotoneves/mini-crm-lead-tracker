<?php

namespace App\Services;

use App\Models\ActivityLog;

class ActivityLogService
{
    public function getLogsByLead(int $leadId)
    {
        return ActivityLog::with(['user', 'fromStage', 'toStage'])
            ->where('lead_id', $leadId)
            ->latest()
            ->get();
    }
}
