<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'user_type',
        'email_verified_at',
        'remember_token',
        'created_at',
        'updated_at',
        'avatar',
        'phone',
        'address',
        'date_of_birth',
        'place_of_birth',
        'nationality',
        'religion',
        'passport_number',
        'passport_expiration_date',
        'mailing_address',
        'program_study',
        'faculty',
        'student_id',
        'gpa',
        'year_semester',
        'cv_path',
        'transcript_path',
        'toefl_path',
        'toefl_score',
        'toefl_test_date',
        'integrity_letter_path',
        'parent_name',
        'parental_relationship',
        'parent_address',
        'parent_telephone',
        'parent_mobile',
        'parent_email',
    ];

    protected $guarded = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'date_of_birth' => 'date',
        'passport_expiration_date' => 'date',
        'toefl_test_date' => 'date',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = true;

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function news()
    {
        return $this->hasMany(PageNews::class, 'created_by', 'id');
    }
}
