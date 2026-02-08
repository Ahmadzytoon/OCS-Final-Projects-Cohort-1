<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningOutcome extends Model
{
    protected $fillable = [
        'course_id',
        'outcome_text',
        'order',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
