<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageTestimonials extends Model
{
    use HasFactory;

    protected $table = 'page_testimonials';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'position',
        'company',
        'title',
        'description',
        'content',
        'photo',
        'image',
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
