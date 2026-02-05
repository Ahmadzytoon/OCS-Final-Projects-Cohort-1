<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'company_id',
        'department_id',
        'name',
        'email',
        'password',
        'phone',
        'position',
        'avatar',
        'role',
        'status',
        'email_verified_at',
        'joined_at',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'joined_at' => 'datetime',
        'last_login_at' => 'datetime',
        'password' => 'hashed',
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

    // Role checks
    public function isCompanyOwner()
    {
        return $this->role === 'company_owner';
    }

    public function isDepartmentManager()
    {
        return $this->role === 'department_manager';
    }

    public function isEmployee()
    {
        return $this->role === 'employee';
    }
}
