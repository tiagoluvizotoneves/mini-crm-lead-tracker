<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\LeadService;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    protected LeadService $leadService;

    public function __construct(LeadService $leadService)
    {
        $this->leadService = $leadService;
    }

    public function move(Request $request, int $id)
    {
        $request->validate([
            'to_stage_id' => 'required|exists:kanban_stages,id',
        ]);

        $this->leadService->moveLead($id, $request->to_stage_id, auth()->id());

        return response()->json(['mensagem' => 'Lead movido com sucesso.']);
    }
}
