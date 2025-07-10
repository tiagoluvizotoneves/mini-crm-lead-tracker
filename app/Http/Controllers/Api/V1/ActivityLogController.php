<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityLogResource;
use App\Services\ActivityLogService;

class ActivityLogController extends Controller
{
    protected ActivityLogService $activityLogService;

    public function __construct(ActivityLogService $activityLogService)
    {
        $this->activityLogService = $activityLogService;
    }

    public function index(int $leadId)
    {
        $logs = $this->activityLogService->getLogsByLead($leadId);
        return ActivityLogResource::collection($logs);
    }
}
