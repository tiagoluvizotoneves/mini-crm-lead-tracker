<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'user_id',
        'from_stage_id',
        'to_stage_id',
        'message'
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fromStage()
    {
        return $this->belongsTo(KanbanStage::class, 'from_stage_id');
    }

    public function toStage()
    {
        return $this->belongsTo(KanbanStage::class, 'to_stage_id');
    }
}
