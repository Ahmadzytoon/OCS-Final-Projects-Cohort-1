<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectResource extends Model
{
    protected $fillable = [
        'project_id',
        'title',
        'file_path',
        'type',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
