<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Programs extends Model
{
    use HasFactory;

    protected $table = 'programs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type_id',
        'code',
        'name',
        'title',
        'description',
        'type',
        'program_type',
        'category',
        'duration',
        'requirements',
        'image',
        'is_active',
        'is_featured',
        'status',
        'created_by',
        'updated_by',
        'open_date',
        'close_date',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'open_date' => 'datetime',
        'close_date' => 'datetime',
    ];
    
    public function isOpen()
    {
        if (!$this->open_date || !$this->close_date) {
            return true;
        }
        
        $now = now();
        return $now->between($this->open_date, $this->close_date);
    }
    
    public function isClosed()
    {
        if (!$this->close_date) {
            return false;
        }
        
        return now()->greaterThan($this->close_date);
    }

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = true;

    public function type()
    {
        return $this->belongsTo(ProgramsType::class, 'type_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
