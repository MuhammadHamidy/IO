<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PagePartners extends Model
{
    use HasFactory;

    protected $table = 'page_partners';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'country',
        'regional',
        'category',
        'website',
        'logo',
        'address',
        'description',
        'english_profiency',
        'eligible_departement',
        'study_periode',
        'fact_sheet',
        'partnership_start_date',
        'partnership_end_date',
        'cooperation_fields',
        'partnership_type',
        'contact_person',
        'contact_email',
        'contact_phone',
        'created_by',
        'updated_by',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = true;

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
