<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'instructions',
        'difficulty',
        'xp_points',
        'estimated_hours',
        'order',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function requirements()
    {
        return $this->hasMany(ProjectRequirement::class)->orderBy('order');
    }

    public function resources()
    {
        return $this->hasMany(ProjectResource::class);
    }

    public function submissions()
    {
        return $this->hasMany(ProjectSubmission::class);
    }
}
