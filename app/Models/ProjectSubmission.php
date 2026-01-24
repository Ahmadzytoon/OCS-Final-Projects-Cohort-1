<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectSubmission extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
        'github_url',
        'notes',
        'status',
        'instructor_feedback',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
