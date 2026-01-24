<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'department_id',
        'name',
        'email',
        'phone',
        'position',
        'message',
        'status',
        'assigned_role',
        'reviewed_by',
        'reviewed_at',
        'rejection_reason',
        'rejection_message',
        'welcome_message',
        'requested_at',
    ];

    protected $casts = [
        'requested_at' => 'datetime',
        'reviewed_at' => 'datetime',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    // Scopes
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

    public function scopeRecent($query)
    {
        return $query->orderBy('requested_at', 'desc');
    }

    // Accessors
    public function getStatusLabelAttribute()
    {
        $labels = [
            'pending' => 'Pending Review',
            'approved' => 'Approved',
            'rejected' => 'Rejected',
        ];

        return $labels[$this->status] ?? $this->status;
    }

    public function getStatusBadgeClassAttribute()
    {
        $classes = [
            'pending' => 'bg-warning',
            'approved' => 'bg-success',
            'rejected' => 'bg-danger',
        ];

        return $classes[$this->status] ?? 'bg-secondary';
    }

    public function getRejectionReasonLabelAttribute()
    {
        $labels = [
            'not_hiring' => 'Not currently hiring',
            'no_position' => 'No available positions',
            'qualifications' => 'Doesn\'t meet qualifications',
            'other' => 'Other',
        ];

        return $labels[$this->rejection_reason] ?? $this->rejection_reason;
    }

    public function getRoleLabelAttribute()
    {
        $labels = [
            'company_owner' => 'Company Admin',
            'department_manager' => 'Department Manager',
            'employee' => 'Employee',
        ];

        return $labels[$this->assigned_role] ?? $this->assigned_role;
    }

    // Status checks
    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    // Methods
    public function approve($departmentId, $role, $welcomeMessage = null, $reviewerId = null)
    {
        $this->update([
            'status' => 'approved',
            'department_id' => $departmentId,
            'assigned_role' => $role,
            'welcome_message' => $welcomeMessage,
            'reviewed_by' => $reviewerId ,
            'reviewed_at' => now(),
        ]);

        return $this;
    }

    public function reject($reason, $message = null, $reviewerId = null)
    {
        $this->update([
            'status' => 'rejected',
            'rejection_reason' => $reason,
            'rejection_message' => $message,
            'reviewed_by' => $reviewerId,
            'reviewed_at' => now(),
        ]);

        return $this;
    }
}
