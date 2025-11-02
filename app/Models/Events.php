<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'title',
        'description',
        'date',
        'location',
        'image',
        'status',
        'created_by',
        'updated_by',
        'open_date',
        'close_date',
    ];

    protected $casts = [
        'date' => 'datetime',
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
