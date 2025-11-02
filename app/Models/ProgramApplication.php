<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'program_id',
        'status',
        'current_stage',
        'documents',
        'notes',
        'admin_notes',
        'submitted_at',
        'reviewed_at',
        'stage_updated_at',
        'stage_history',
    ];

    protected $casts = [
        'documents' => 'array',
        'stage_history' => 'array',
        'submitted_at' => 'datetime',
        'reviewed_at' => 'datetime',
        'stage_updated_at' => 'datetime',
    ];

    public static function getStages()
    {
        return [
            'on_progress' => 'On Progress',
            'submitted' => 'Submitted',
            'revision_required' => 'Revision Required',
            'accepted' => 'Accepted',
            'study_permit' => 'Study Permit Issuance',
            'student_visa' => 'Student Visa Issuance',
            'lectures' => 'Lectures',
            'submitted_epo_erp' => 'Submitted EPO/ERP',
            'transcript_issuance' => 'Transcript Issuance',
        ];
    }

    public function getStageNumber()
    {
        $stages = array_keys(self::getStages());
        return array_search($this->current_stage, $stages) + 1;
    }

    public function getTotalStages()
    {
        return count(self::getStages());
    }

    public function getProgressPercentage()
    {
        return round(($this->getStageNumber() / $this->getTotalStages()) * 100);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(Programs::class, 'program_id');
    }
}


