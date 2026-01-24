<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KnowledgeType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'name',
        'slug',
        'icon',
        'color',
        'description',
        'examples',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'examples' => 'array',
        'order' => 'integer',
    ];

    /**
     * Get the company that owns the knowledge type
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Scope to get only active types
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to filter by company
     */
    public function scopeForCompany($query, $companyId)
    {
        return $query->where('company_id', $companyId);
    }

    /**
     * Scope to order by custom order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
