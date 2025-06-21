<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'kanban_stage_id',
        'name',
        'email',
        'phone',
        'origin',
        'notes'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function kanbanStage()
    {
        return $this->belongsTo(KanbanStage::class);
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }
}
