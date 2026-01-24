<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Carbon\Carbon;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'plan_id',
        'status',
        'trial_ends_at',
        'starts_at',
        'ends_at',
        'cancelled_at',
    ];

    protected $casts = [
        'trial_ends_at' => 'datetime',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    // ==================== Relationships ====================

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function lastPayment(): HasOne
    {
        return $this->hasOne(Payment::class)->latestOfMany();
    }

    // ==================== Scopes ====================

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeTrial($query)
    {
        return $query->where('status', 'trial');
    }

    public function scopeExpired($query)
    {
        return $query->where('status', 'expired');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeForCompany($query, $companyId)
    {
        return $query->where('company_id', $companyId);
    }

    public function scopeEnding($query, $days = 7)
    {
        return $query->where('status', 'active')
            ->whereBetween('ends_at', [now(), now()->addDays($days)]);
    }

    // ==================== Status Checkers ====================

    public function isActive(): bool
    {
        return $this->status === 'active'
            && (!$this->ends_at || $this->ends_at->isFuture());
    }

    public function isTrial(): bool
    {
        return $this->status === 'trial'
            && $this->trial_ends_at
            && $this->trial_ends_at->isFuture();
    }

    public function isExpired(): bool
    {
        return $this->status === 'expired'
            || ($this->ends_at && $this->ends_at->isPast());
    }

    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }

    public function isSuspended(): bool
    {
        return $this->status === 'suspended';
    }

    // ==================== Helper Methods ====================

    /**
     * Check if subscription is valid (active or trial)
     */
    public function isValid(): bool
    {
        return $this->isActive() || $this->isTrial();
    }

    /**
     * Get days remaining
     */
    public function daysRemaining(): int
    {
        if ($this->isTrial() && $this->trial_ends_at) {
            return max(0, now()->diffInDays($this->trial_ends_at, false));
        }

        if ($this->ends_at) {
            return max(0, now()->diffInDays($this->ends_at, false));
        }

        return 0;
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'active' => 'success',
            'trial' => 'info',
            'expired' => 'danger',
            'cancelled' => 'warning',
            'suspended' => 'secondary',
            default => 'secondary',
        };
    }

    /**
     * Get status display name
     */
    public function getStatusDisplayAttribute(): string
    {
        return match ($this->status) {
            'active' => 'Active',
            'trial' => 'Trial',
            'expired' => 'Expired',
            'cancelled' => 'Cancelled',
            'suspended' => 'Suspended',
            default => ucfirst($this->status),
        };
    }

    /**
     * Activate subscription
     */
    public function activate(): self
    {
        $billingCycle = $this->plan->billing_cycle;

        $this->update([
            'status' => 'active',
            'starts_at' => now(),
            'ends_at' => $this->calculateEndDate($billingCycle),
            'trial_ends_at' => null,
        ]);

        // Update company's current subscription
        $this->company->update([
            'current_subscription_id' => $this->id,
        ]);

        return $this;
    }

    /**
     * Start trial
     */
    public function startTrial($days = 14): self
    {
        $this->update([
            'status' => 'trial',
            'trial_ends_at' => now()->addDays($days),
            'starts_at' => now(),
        ]);

        // Update company's current subscription
        $this->company->update([
            'current_subscription_id' => $this->id,
        ]);

        return $this;
    }

    /**
     * Cancel subscription
     */
    public function cancel($immediately = false): self
    {
        if ($immediately) {
            $this->update([
                'status' => 'cancelled',
                'cancelled_at' => now(),
                'ends_at' => now(),
            ]);
        } else {
            // Cancel at end of period
            $this->update([
                'status' => 'cancelled',
                'cancelled_at' => now(),
            ]);
        }

        return $this;
    }

    /**
     * Renew subscription
     */
    public function renew(): self
    {
        $billingCycle = $this->plan->billing_cycle;

        $this->update([
            'status' => 'active',
            'starts_at' => $this->ends_at ?? now(),
            'ends_at' => $this->calculateEndDate($billingCycle, $this->ends_at ?? now()),
            'cancelled_at' => null,
        ]);

        return $this;
    }

    /**
     * Expire subscription
     */
    public function expire(): self
    {
        $this->update([
            'status' => 'expired',
        ]);

        return $this;
    }

    /**
     * Suspend subscription
     */
    public function suspend(): self
    {
        $this->update([
            'status' => 'suspended',
        ]);

        return $this;
    }

    /**
     * Resume suspended subscription
     */
    public function resume(): self
    {
        $this->update([
            'status' => 'active',
        ]);

        return $this;
    }

    /**
     * Calculate end date based on billing cycle
     */
    private function calculateEndDate($billingCycle, $startDate = null): Carbon
    {
        $start = $startDate ? Carbon::parse($startDate) : now();

        return match ($billingCycle) {
            'monthly' => $start->addMonth(),
            'yearly' => $start->addYear(),
            'lifetime' => $start->addYears(100), // Lifetime = 100 years
            default => $start->addMonth(),
        };
    }

    /**
     * Check if trial is ending soon
     */
    public function isTrialEndingSoon($days = 3): bool
    {
        if (!$this->isTrial() || !$this->trial_ends_at) {
            return false;
        }

        return $this->trial_ends_at->diffInDays(now()) <= $days;
    }

    /**
     * Check if subscription is ending soon
     */
    public function isEndingSoon($days = 7): bool
    {
        if (!$this->ends_at) {
            return false;
        }

        $daysRemaining = now()->diffInDays($this->ends_at, false);
        return $daysRemaining >= 0 && $daysRemaining <= $days;
    }

    /**
     * Get formatted expiry date
     */
    public function getExpiryDateAttribute(): ?string
    {
        if ($this->isTrial() && $this->trial_ends_at) {
            return $this->trial_ends_at->format('M d, Y');
        }

        if ($this->ends_at) {
            return $this->ends_at->format('M d, Y');
        }

        return null;
    }

    /**
     * Check if company can perform action based on plan limits
     */
    public function canAddUser(): bool
    {
        if (!$this->isValid()) {
            return false;
        }

        return $this->plan->canAddUser($this->company);
    }

    public function canAddKnowledgeCard(): bool
    {
        if (!$this->isValid()) {
            return false;
        }

        return $this->plan->canAddKnowledgeCard($this->company);
    }

    /**
     * Boot method to auto-expire subscriptions
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subscription) {
            if (empty($subscription->starts_at)) {
                $subscription->starts_at = now();
            }
        });
    }
}
