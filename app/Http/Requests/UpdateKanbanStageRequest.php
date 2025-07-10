<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKanbanStageRequest extends FormRequest
{
    public function rules(): array
    {
        return (new StoreKanbanStageRequest())->rules();
    }
}
