<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'user_id',
        'experience',
        'expertise_areas',
        'teaching_experience',
    ];

    protected $casts = [
        'expertise_areas' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'instructor_id', 'user_id');
    }
}
