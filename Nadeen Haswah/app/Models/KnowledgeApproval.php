<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KnowledgeApproval extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'knowledge_entry_id',
        'approved_by',
        'status',
        'comment',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // ==================== Relationships ====================

    public function knowledgeEntry(): BelongsTo
    {
        return $this->belongsTo(KnowledgeEntry::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // ==================== Scopes ====================

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function scopePendingChanges($query)
    {
        return $query->where('status', 'pending_changes');
    }

    public function scopeForEntry($query, $entryId)
    {
        return $query->where('knowledge_entry_id', $entryId);
    }

    public function scopeByApprover($query, $approverId)
    {
        return $query->where('approved_by', $approverId);
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    // ==================== Status Checkers ====================

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    public function isPendingChanges(): bool
    {
        return $this->status === 'pending_changes';
    }

    // ==================== Accessors ====================

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'approved' => 'success',
            'rejected' => 'danger',
            'pending_changes' => 'warning',
            default => 'secondary',
        };
    }

    /**
     * Get status display name
     */
    public function getStatusDisplayAttribute(): string
    {
        return match($this->status) {
            'approved' => 'Approved',
            'rejected' => 'Rejected',
            'pending_changes' => 'Pending Changes',
            default => ucfirst($this->status),
        };
    }

    /**
     * Get status icon
     */
    public function getStatusIconAttribute(): string
    {
        return match($this->status) {
            'approved' => 'fa-check-circle',
            'rejected' => 'fa-times-circle',
            'pending_changes' => 'fa-exclamation-circle',
            default => 'fa-circle',
        };
    }

    // ==================== Helper Methods ====================

    /**
     * Get formatted approval time
     */
    public function getFormattedTimeAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Check if has comment
     */
    public function hasComment(): bool
    {
        return !empty($this->comment);
    }

    /**
     * Get comment or default message
     */
    public function getCommentOrDefaultAttribute(): string
    {
        if ($this->hasComment()) {
            return $this->comment;
        }

        return match($this->status) {
            'approved' => 'No comment provided',
            'rejected' => 'Rejected without comment',
            'pending_changes' => 'Changes requested',
            default => 'No comment',
        };
    }

    // ==================== Static Methods ====================

    /**
     * Create approval record
     */
    public static function createApproval(
        KnowledgeEntry $entry,
        User $approver,
        string $status = 'approved',
        ?string $comment = null
    ): self {
        $approval = self::create([
            'knowledge_entry_id' => $entry->id,
            'approved_by' => $approver->id,
            'status' => $status,
            'comment' => $comment,
        ]);

        // Update knowledge entry status based on approval
        $entry->update([
            'status' => $status === 'approved' ? 'approved' : 'rejected',
            'reviewed_by' => $approver->id,
            'reviewed_at' => now(),
        ]);

        if ($status === 'approved') {
            $entry->update([
                'published_at' => now(),
            ]);
        } elseif ($status === 'rejected') {
            $entry->update([
                'rejection_reason' => $comment,
            ]);
        }

        return $approval;
    }

    /**
     * Get approval history for entry
     */
    public static function getHistoryForEntry($entryId)
    {
        return self::forEntry($entryId)
            ->with('approver')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get recent approvals by approver
     */
    public static function getRecentByApprover($approverId, $limit = 10)
    {
        return self::byApprover($approverId)
            ->with('knowledgeEntry')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    /**
     * Get approval statistics
     */
    public static function getStatistics($approverId = null, $days = 30)
    {
        $query = self::recent($days);

        if ($approverId) {
            $query->byApprover($approverId);
        }

        return [
            'total' => $query->count(),
            'approved' => (clone $query)->approved()->count(),
            'rejected' => (clone $query)->rejected()->count(),
            'pending_changes' => (clone $query)->pendingChanges()->count(),
        ];
    }
}
