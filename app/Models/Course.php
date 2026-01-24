<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'instructor_id',
        'title',
        'short_description',
        'full_description',
        'thumbnail',
        'difficulty',
        'pricing',
        'price',
        'language',
        'is_private',
        'invitation_url',
    ];

    protected $casts = [
        'is_private' => 'boolean',
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class)->orderBy('order');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function learningOutcomes()
    {
        return $this->hasMany(LearningOutcome::class)->orderBy('order');
    }
}
