<?php

namespace App\Services;

use App\Events\LeadMovedEvent;
use App\Jobs\ExportLeadsJob;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadService
{
    public function moveLead(int $leadId, int $toStageId, int $userId): void
    {
        $lead = Lead::findOrFail($leadId);

        $fromStageId = $lead->kanban_stage_id;

        if ($fromStageId !== $toStageId) {
            $lead->update(['kanban_stage_id' => $toStageId]);

            event(new LeadMovedEvent($lead, $fromStageId, $toStageId, $userId));
        }
    }

    public function exportLeads(Request $request)
    {
        ExportLeadsJob::dispatch(auth()->id());

        return response()->json(['mensagem' => 'Exportação iniciada com sucesso. O arquivo estará disponível em breve.']);
    }
}
