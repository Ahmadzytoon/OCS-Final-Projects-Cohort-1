<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class CompanyNews extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'company_news';

    protected $fillable = [
        'company_id',
        'created_by',
        'publisher_id',
        'title',
        'summary',
        'content',
        'featured_image',
        'category',
        'status',
        'published_at',
        'scheduled_at',
        'send_notification',
        'allow_comments',
        'slug',
        'views_count',
        'comments_count',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'scheduled_at' => 'datetime',
        'send_notification' => 'boolean',
        'allow_comments' => 'boolean',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id');
    }



    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    public function scopeScheduled($query)
    {
        return $query->where('status', 'scheduled')
            ->where('scheduled_at', '>', now());
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    // Accessors
    public function getCategoryLabelAttribute()
    {
        $labels = [
            'company' => 'Company Update',
            'product' => 'Product News',
            'hr' => 'HR Update',
            'achievement' => 'Achievement',
            'announcement' => 'Announcement',
        ];

        return $labels[$this->category] ?? $this->category;
    }

    // Methods
    public function incrementViews()
    {
        $this->increment('views_count');
    }

    public function isPublished()
    {
        return $this->status === 'published' &&
            $this->published_at &&
            $this->published_at->isPast();
    }

    public function isScheduled()
    {
        return $this->status === 'scheduled' &&
            $this->scheduled_at &&
            $this->scheduled_at->isFuture();
    }

    public function isDraft()
    {
        return $this->status === 'draft';
    }

    // Auto-generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = static::generateUniqueSlug($news->title);
            }

            // Auto-generate summary from content
            if (empty($news->summary) && !empty($news->content)) {
                $news->summary = Str::limit(strip_tags($news->content), 200);
            }
        });
    }

    public static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
