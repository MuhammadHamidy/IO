<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageNews extends Model
{
    use HasFactory;

    protected $table = 'page_news';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'cover',
        'image',
        'supporting_images',
        'created_by',
        'updated_by',
        'is_publish',
        'is_highlight',
        'status',
        'featured',
        'archived_at',
    ];

    protected $casts = [
        'is_publish' => 'boolean',
        'is_highlight' => 'boolean',
        'featured' => 'boolean',
        'supporting_images' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'archived_at' => 'datetime',
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

    public function scopeActive($query)
    {
        return $query->whereNull('archived_at');
    }

    public function scopeArchived($query)
    {
        return $query->whereNotNull('archived_at');
    }

    public function isArchived()
    {
        return !is_null($this->archived_at);
    }

    public function archive()
    {
        $this->archived_at = now();
        $this->save();
    }

    public function unarchive()
    {
        $this->archived_at = null;
        $this->save();
    }

}
