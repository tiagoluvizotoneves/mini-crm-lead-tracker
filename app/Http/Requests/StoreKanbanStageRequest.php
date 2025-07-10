<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKanbanStageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'position' => 'required|integer|min:0',
            'color' => 'nullable|string|max:20',
        ];
    }
}
