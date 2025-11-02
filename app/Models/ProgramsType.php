<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramsType extends Model
{
    use HasFactory;

    protected $table = 'program_types';
    protected $primaryKey = 'id'; 
    protected $fillable = ['name'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = true;

    public function programs()
    {
        return $this->hasMany(Programs::class, 'type_id', 'id');
    }
}
