<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'subscription_id',
        'company_id',
        'amount',
        'currency',
        'payment_method',
        'payment_status',
        'transaction_id',
        'payment_details',
        'failure_reason',
        'paid_at',
        'refunded_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_details' => 'array',
        'paid_at' => 'datetime',
        'refunded_at' => 'datetime',
    ];

    // ==================== Relationships ====================

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    // ==================== Scopes ====================

    public function scopeForCompany($query, $companyId)
    {
        return $query->where('company_id', $companyId);
    }

    public function scopeForSubscription($query, $subscriptionId)
    {
        return $query->where('subscription_id', $subscriptionId);
    }

    public function scopePending($query)
    {
        return $query->where('payment_status', 'pending');
    }

    public function scopeProcessing($query)
    {
        return $query->where('payment_status', 'processing');
    }

    public function scopeCompleted($query)
    {
        return $query->where('payment_status', 'completed');
    }

    public function scopeFailed($query)
    {
        return $query->where('payment_status', 'failed');
    }

    public function scopeRefunded($query)
    {
        return $query->where('payment_status', 'refunded');
    }

    public function scopeSuccessful($query)
    {
        return $query->where('payment_status', 'completed');
    }

    public function scopeByMethod($query, $method)
    {
        return $query->where('payment_method', $method);
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    // ==================== Status Checkers ====================

    public function isPending(): bool
    {
        return $this->payment_status === 'pending';
    }

    public function isProcessing(): bool
    {
        return $this->payment_status === 'processing';
    }

    public function isCompleted(): bool
    {
        return $this->payment_status === 'completed';
    }

    public function isFailed(): bool
    {
        return $this->payment_status === 'failed';
    }

    public function isRefunded(): bool
    {
        return $this->payment_status === 'refunded';
    }

    public function isCancelled(): bool
    {
        return $this->payment_status === 'cancelled';
    }

    public function isSuccessful(): bool
    {
        return $this->payment_status === 'completed';
    }

    // ==================== Accessors ====================

    /**
     * Get formatted amount with currency
     */
    public function getFormattedAmountAttribute(): string
    {
        $symbol = $this->getCurrencySymbol();
        return $symbol . number_format($this->amount, 2);
    }

    /**
     * Get currency symbol
     */
    private function getCurrencySymbol(): string
    {
        return match ($this->currency) {
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
            'JOD' => 'JD',
            'SAR' => 'SR',
            'AED' => 'AED',
            default => $this->currency . ' ',
        };
    }

    /**
     * Get payment status badge color
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->payment_status) {
            'completed' => 'success',
            'processing' => 'info',
            'pending' => 'warning',
            'failed' => 'danger',
            'refunded' => 'secondary',
            'cancelled' => 'dark',
            default => 'secondary',
        };
    }

    /**
     * Get payment status display name
     */
    public function getStatusDisplayAttribute(): string
    {
        return match ($this->payment_status) {
            'completed' => 'Completed',
            'processing' => 'Processing',
            'pending' => 'Pending',
            'failed' => 'Failed',
            'refunded' => 'Refunded',
            'cancelled' => 'Cancelled',
            default => ucfirst($this->payment_status),
        };
    }

    /**
     * Get payment method display name
     */
    public function getMethodDisplayAttribute(): string
    {
        return match ($this->payment_method) {
            'credit_card' => 'Credit Card',
            'debit_card' => 'Debit Card',
            'paypal' => 'PayPal',
            'stripe' => 'Stripe',
            'bank_transfer' => 'Bank Transfer',
            'cash' => 'Cash',
            'other' => 'Other',
            default => ucfirst(str_replace('_', ' ', $this->payment_method)),
        };
    }

    /**
     * Get payment method icon
     */
    public function getMethodIconAttribute(): string
    {
        return match ($this->payment_method) {
            'credit_card', 'debit_card' => 'fa-credit-card',
            'paypal' => 'fa-paypal',
            'stripe' => 'fa-stripe',
            'bank_transfer' => 'fa-university',
            'cash' => 'fa-money-bill',
            default => 'fa-wallet',
        };
    }

    // ==================== Actions ====================

    /**
     * Mark payment as completed
     */
    public function markAsCompleted($transactionId = null): self
    {
        $this->update([
            'payment_status' => 'completed',
            'paid_at' => now(),
            'transaction_id' => $transactionId ?? $this->transaction_id,
        ]);

        // Activate subscription if pending
        if ($this->subscription->status === 'trial' || $this->subscription->status === 'expired') {
            $this->subscription->activate();
        } elseif ($this->subscription->isCancelled()) {
            $this->subscription->renew();
        }

        return $this;
    }

    /**
     * Mark payment as failed
     */
    public function markAsFailed($reason = null): self
    {
        $this->update([
            'payment_status' => 'failed',
            'failure_reason' => $reason,
        ]);

        return $this;
    }

    /**
     * Mark payment as processing
     */
    public function markAsProcessing($transactionId = null): self
    {
        $this->update([
            'payment_status' => 'processing',
            'transaction_id' => $transactionId ?? $this->transaction_id,
        ]);

        return $this;
    }

    /**
     * Refund payment
     */
    public function refund($reason = null): self
    {
        $this->update([
            'payment_status' => 'refunded',
            'refunded_at' => now(),
            'failure_reason' => $reason,
        ]);

        return $this;
    }

    /**
     * Cancel payment
     */
    public function cancel($reason = null): self
    {
        $this->update([
            'payment_status' => 'cancelled',
            'failure_reason' => $reason,
        ]);

        return $this;
    }

    /**
     * Store payment gateway response
     */
    public function storePaymentDetails(array $details): self
    {
        $currentDetails = $this->payment_details ?? [];
        $this->update([
            'payment_details' => array_merge($currentDetails, $details),
        ]);

        return $this;
    }

    // ==================== Static Methods ====================

    /**
     * Create new payment
     */
    public static function createForSubscription(
        Subscription $subscription,
        float $amount,
        string $paymentMethod = 'credit_card',
        string $currency = 'USD'
    ): self {
        return self::create([
            'subscription_id' => $subscription->id,
            'company_id' => $subscription->company_id,
            'amount' => $amount,
            'currency' => $currency,
            'payment_method' => $paymentMethod,
            'payment_status' => 'pending',
        ]);
    }

    /**
     * Get total revenue for company
     */
    public static function getTotalRevenueForCompany($companyId): float
    {
        return self::forCompany($companyId)
            ->completed()
            ->sum('amount');
    }

    /**
     * Get monthly revenue
     */
    public static function getMonthlyRevenue($month = null, $year = null): float
    {
        $month = $month ?? now()->month;
        $year = $year ?? now()->year;

        return self::completed()
            ->whereYear('paid_at', $year)
            ->whereMonth('paid_at', $month)
            ->sum('amount');
    }

    // ==================== Boot ====================

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($payment) {
            if (empty($payment->transaction_id)) {
                $payment->transaction_id = 'TXN-' . strtoupper(uniqid());
            }
        });
    }
}
