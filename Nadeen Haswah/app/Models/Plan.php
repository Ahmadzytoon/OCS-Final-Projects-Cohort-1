<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'billing_cycle',
        'max_users',
        'max_knowledge_cards',
        'ai_requests_limit',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'max_users' => 'integer',
        'max_knowledge_cards' => 'integer',
        'ai_requests_limit' => 'integer',
        'is_active' => 'boolean',
    ];

    // ==================== Scopes ====================

    /**
     * Get only active plans
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Filter by billing cycle
     */
    public function scopeBillingCycle($query, $cycle)
    {
        return $query->where('billing_cycle', $cycle);
    }

    /**
     * Get monthly plans
     */
    public function scopeMonthly($query)
    {
        return $query->where('billing_cycle', 'monthly');
    }

    /**
     * Get yearly plans
     */
    public function scopeYearly($query)
    {
        return $query->where('billing_cycle', 'yearly');
    }

    /**
     * Order by price
     */
    public function scopeOrderByPrice($query, $direction = 'asc')
    {
        return $query->orderBy('price', $direction);
    }

    // ==================== Accessors ====================

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute(): string
    {
        if ($this->price == 0) {
            return 'Free';
        }
        return '$' . number_format($this->price, 2);
    }

    /**
     * Get price per month (for yearly plans)
     */
    public function getPricePerMonthAttribute(): float
    {
        if ($this->billing_cycle === 'yearly') {
            return round($this->price / 12, 2);
        }
        return $this->price;
    }

    /**
     * Get savings percentage (for yearly vs monthly)
     */
    public function getSavingsPercentageAttribute(): int
    {
        if ($this->billing_cycle === 'yearly') {
            return 20; // معروف أنه 20% خصم
        }
        return 0;
    }

    // ==================== Helper Methods ====================

    /**
     * Check if plan is free
     */
    public function isFree(): bool
    {
        return $this->price == 0;
    }

    /**
     * Check if plan is unlimited for users
     */
    public function hasUnlimitedUsers(): bool
    {
        return $this->max_users == 0;
    }

    /**
     * Check if plan is unlimited for knowledge cards
     */
    public function hasUnlimitedKnowledgeCards(): bool
    {
        return $this->max_knowledge_cards == 0;
    }

    /**
     * Check if plan has unlimited AI requests
     */
    public function hasUnlimitedAiRequests(): bool
    {
        return $this->ai_requests_limit == 0;
    }

    /**
     * Get display value for max users
     */
    public function getMaxUsersDisplayAttribute(): string
    {
        return $this->max_users == 0 ? 'Unlimited' : $this->max_users;
    }

    /**
     * Get display value for max knowledge cards
     */
    public function getMaxKnowledgeCardsDisplayAttribute(): string
    {
        return $this->max_knowledge_cards == 0 ? 'Unlimited' : number_format($this->max_knowledge_cards);
    }

    /**
     * Get display value for AI requests limit
     */
    public function getAiRequestsLimitDisplayAttribute(): string
    {
        return $this->ai_requests_limit == 0 ? 'Unlimited' : number_format($this->ai_requests_limit);
    }

    /**
     * Get billing cycle display name
     */
    public function getBillingCycleDisplayAttribute(): string
    {
        return match ($this->billing_cycle) {
            'monthly' => 'Monthly',
            'yearly' => 'Yearly',
            'lifetime' => 'Lifetime',
            default => ucfirst($this->billing_cycle),
        };
    }

    /**
     * Check if company can add more users
     */
    public function canAddUser(Company $company): bool
    {
        if ($this->hasUnlimitedUsers()) {
            return true;
        }

        return $company->users()->count() < $this->max_users;
    }

    /**
     * Check if company can add more knowledge cards
     */
    public function canAddKnowledgeCard(Company $company): bool
    {
        if ($this->hasUnlimitedKnowledgeCards()) {
            return true;
        }

        return $company->knowledgeEntries()->count() < $this->max_knowledge_cards;
    }

    /**
     * Get remaining users slots
     */
    public function getRemainingUserSlots(Company $company): int|string
    {
        if ($this->hasUnlimitedUsers()) {
            return 'Unlimited';
        }

        return max(0, $this->max_users - $company->users()->count());
    }

    /**
     * Get remaining knowledge cards slots
     */
    public function getRemainingKnowledgeCardSlots(Company $company): int|string
    {
        if ($this->hasUnlimitedKnowledgeCards()) {
            return 'Unlimited';
        }

        return max(0, $this->max_knowledge_cards - $company->knowledgeEntries()->count());
    }
}
