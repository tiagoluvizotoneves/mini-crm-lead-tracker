<?php

namespace App\Jobs;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;

class ExportLeadsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function handle(): void
    {
        $leads = Lead::with(['kanbanStage', 'company'])->get();

        $csv = fopen('php://temp', 'r+');
        fputcsv($csv, ['ID', 'Nome', 'Email', 'Telefone', 'Origem', 'Empresa', 'Estágio']);

        foreach ($leads as $lead) {
            fputcsv($csv, [
                $lead->id,
                $lead->name,
                $lead->email,
                $lead->phone,
                $lead->origin,
                $lead->company->name ?? '',
                $lead->kanbanStage->name ?? '',
            ]);
        }

        rewind($csv);
        $content = stream_get_contents($csv);
        fclose($csv);

        Storage::disk('local')->put("exports/leads_user_{$this->userId}.csv", $content);
    }
}
