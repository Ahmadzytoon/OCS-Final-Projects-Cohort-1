<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'workspace_name',
        'slug',
        'company_name',
        'logo',
        'company_size',
        'industry',
        'other_industry',
        'current_subscription_id',
        'is_active',
        'activated_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'activated_at' => 'datetime',
    ];

    // ==================== Relationships ====================

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    public function knowledgeTypes(): HasMany
    {
        return $this->hasMany(KnowledgeType::class);
    }

    public function knowledgeEntries(): HasMany
    {
        return $this->hasMany(KnowledgeEntry::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function currentSubscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class, 'current_subscription_id');
    }

    public function companyNews(): HasMany
    {
        return $this->hasMany(CompanyNews::class);
    }

    public function calendarEvents(): HasMany
    {
        return $this->hasMany(CalendarEvent::class);
    }

    public function accessRequests(): HasMany
    {
        return $this->hasMany(AccessRequest::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    // ==================== Scopes ====================

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    // ==================== Helper Methods ====================

    /**
     * Get current active plan
     */
    public function getCurrentPlan(): ?Plan
    {
        return $this->currentSubscription?->plan;
    }

    /**
     * Check if company has active subscription
     */
    public function hasActiveSubscription(): bool
    {
        return $this->currentSubscription && $this->currentSubscription->isValid();
    }

    /**
     * Check if company is on trial
     */
    public function isOnTrial(): bool
    {
        return $this->currentSubscription && $this->currentSubscription->isTrial();
    }

    /**
     * Check if subscription is expired
     */
    public function isSubscriptionExpired(): bool
    {
        return $this->currentSubscription && $this->currentSubscription->isExpired();
    }

    /**
     * Check if company can add more users
     */
    public function canAddUser(): bool
    {
        if (!$this->currentSubscription) {
            return false;
        }

        return $this->currentSubscription->canAddUser();
    }

    /**
     * Check if company can add more knowledge cards
     */
    public function canAddKnowledgeCard(): bool
    {
        if (!$this->currentSubscription) {
            return false;
        }

        return $this->currentSubscription->canAddKnowledgeCard();
    }

    /**
     * Get remaining user slots
     */
    public function getRemainingUserSlots(): int|string
    {
        $plan = $this->getCurrentPlan();

        if (!$plan) {
            return 0;
        }

        return $plan->getRemainingUserSlots($this);
    }

    /**
     * Get remaining knowledge card slots
     */
    public function getRemainingKnowledgeCardSlots(): int|string
    {
        $plan = $this->getCurrentPlan();

        if (!$plan) {
            return 0;
        }

        return $plan->getRemainingKnowledgeCardSlots($this);
    }

    /**
     * Get subscription status with details
     */
    public function getSubscriptionStatus(): array
    {
        $subscription = $this->currentSubscription;

        if (!$subscription) {
            return [
                'has_subscription' => false,
                'status' => 'none',
                'message' => 'No active subscription',
            ];
        }

        return [
            'has_subscription' => true,
            'status' => $subscription->status,
            'plan_name' => $subscription->plan->name,
            'is_trial' => $subscription->isTrial(),
            'days_remaining' => $subscription->daysRemaining(),
            'expiry_date' => $subscription->expiry_date,
            'is_ending_soon' => $subscription->isEndingSoon(),
        ];
    }
}
