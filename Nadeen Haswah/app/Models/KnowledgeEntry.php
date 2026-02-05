<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class KnowledgeEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'department_id',
        'knowledge_type_id',
        'created_by',
        'title',
        'summary',
        'tags',
        'slug',
        'metadata',
        'attachments',
        'status',
        'visibility',
        'reviewed_by',
        'reviewed_at',
        'rejection_reason',
        'views_count',
        'likes_count',
        'comments_count',
        'is_featured',
        'submitted_at',
        'published_at',
    ];

    protected $casts = [
        'tags' => 'array',
        'metadata' => 'array',
        'attachments' => 'array',
        'is_featured' => 'boolean',
        'views_count' => 'integer',
        'likes_count' => 'integer',
        'comments_count' => 'integer',
        'submitted_at' => 'datetime',
        'published_at' => 'datetime',
        'reviewed_at' => 'datetime',
    ];

    // ==================== Relationships ====================

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function knowledgeType(): BelongsTo
    {
        return $this->belongsTo(KnowledgeType::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function approvals(): HasMany
    {
        return $this->hasMany(KnowledgeApproval::class);
    }

    public function latestApproval(): HasOne
    {
        return $this->hasOne(KnowledgeApproval::class)->latestOfMany();
    }

    // ==================== Scopes ====================

    public function scopeForCompany($query, $companyId)
    {
        return $query->where('company_id', $companyId);
    }

    public function scopeForDepartment($query, $departmentId)
    {
        return $query->where('department_id', $departmentId);
    }

    public function scopeOfType($query, $typeId)
    {
        return $query->where('knowledge_type_id', $typeId);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopePublic($query)
    {
        return $query->where('visibility', 'public');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('summary', 'like', "%{$search}%");
        });
    }

    // ==================== Accessors & Mutators ====================

    /**
     * Get specific metadata field based on knowledge type
     */
    public function getMetadataField($field, $default = null)
    {
        return $this->metadata[$field] ?? $default;
    }

    /**
     * Set metadata field
     */
    public function setMetadataField($field, $value)
    {
        $metadata = $this->metadata ?? [];
        $metadata[$field] = $value;
        $this->metadata = $metadata;
    }

    // ==================== Helper Methods ====================

    /**
     * Auto-generate slug from title
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($entry) {
            if (empty($entry->slug)) {
                $entry->slug = Str::slug($entry->title) . '-' . Str::random(6);
            }
            if (empty($entry->submitted_at)) {
                $entry->submitted_at = now();
            }
        });
    }

    /**
     * Approve the entry
     */
    public function approve($reviewerId)
    {
        $this->update([
            'status' => 'approved',
            'reviewed_by' => $reviewerId,
            'reviewed_at' => now(),
            'published_at' => now(),
        ]);
    }

    /**
     * Reject the entry
     */
    public function reject($reviewerId, $reason = null)
    {
        $this->update([
            'status' => 'rejected',
            'reviewed_by' => $reviewerId,
            'reviewed_at' => now(),
            'rejection_reason' => $reason,
        ]);
    }

    /**
     * Increment views
     */
    public function incrementViews()
    {
        $this->increment('views_count');
    }

    /**
     * Toggle like
     */
    public function toggleLike()
    {
        // يمكن تطويرها لاحقاً لتتبع من عمل like
        $this->increment('likes_count');
    }

    /**
     * Check if approved
     */
    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    /**
     * Check if pending
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Check if rejected
     */
    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }
}
