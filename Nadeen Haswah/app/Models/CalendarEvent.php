<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CalendarEvent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'department_id',
        'created_by',
        'title',
        'description',
        'type',
        'location_type',
        'location_details',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'is_all_day',
        'send_notification',
        'is_public',
        'color',
        'slug',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_all_day' => 'boolean',
        'send_notification' => 'boolean',
        'is_public' => 'boolean',
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

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Scopes
    public function scopeCompanyWide($query)
    {
        return $query->where('is_public', true)
            ->whereNull('department_id');
    }

    public function scopeDepartmentOnly($query, $departmentId)
    {
        return $query->where('is_public', false)
            ->where('department_id', $departmentId);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now()->toDateString())
            ->orderBy('start_date', 'asc')
            ->orderBy('start_time', 'asc');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeInDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('start_date', [$startDate, $endDate]);
    }

    // Accessors
    public function getTypeLabelAttribute()
    {
        $labels = [
            'meeting' => 'Meeting',
            'training' => 'Training/Workshop',
            'deadline' => 'Deadline',
            'social' => 'Social Event',
            'holiday' => 'Holiday/Off',
        ];

        return $labels[$this->type] ?? $this->type;
    }

    public function getLocationLabelAttribute()
    {
        $labels = [
            'office' => 'Office',
            'online' => 'Online/Zoom',
            'external' => 'External Location',
        ];

        return $labels[$this->location_type] ?? $this->location_type;
    }

    public function getStartDateTimeAttribute()
    {
        if ($this->is_all_day) {
            return $this->start_date;
        }

        return Carbon::parse($this->start_date->format('Y-m-d') . ' ' . $this->start_time);
    }

    public function getEndDateTimeAttribute()
    {
        if ($this->is_all_day) {
            return $this->end_date;
        }

        return Carbon::parse($this->end_date->format('Y-m-d') . ' ' . $this->end_time);
    }

    // Methods
    public function isCompanyWide()
    {
        return $this->is_public && is_null($this->department_id);
    }

    public function isDepartmentEvent()
    {
        return !$this->is_public && !is_null($this->department_id);
    }

    public function isPast()
    {
        return $this->end_date->isPast();
    }

    public function isToday()
    {
        return $this->start_date->isToday();
    }

    public function isUpcoming()
    {
        return $this->start_date->isFuture();
    }

    public function getDurationInMinutes()
    {
        $start = $this->start_date_time;
        $end = $this->end_date_time;

        return $start->diffInMinutes($end);
    }

    public function getDurationFormatted()
    {
        if ($this->is_all_day) {
            $days = $this->start_date->diffInDays($this->end_date) + 1;
            return $days > 1 ? "$days days" : "All day";
        }

        $minutes = $this->getDurationInMinutes();
        $hours = floor($minutes / 60);
        $mins = $minutes % 60;

        if ($hours > 0 && $mins > 0) {
            return "{$hours}h {$mins}m";
        } elseif ($hours > 0) {
            return "{$hours}h";
        } else {
            return "{$mins}m";
        }
    }

    // Auto-generate slug and color
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = static::generateUniqueSlug($event->title);
            }

            // Auto-assign color based on type if not set
            if (empty($event->color)) {
                $event->color = static::getDefaultColorByType($event->type);
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

    public static function getDefaultColorByType($type)
    {
        $colors = [
            'meeting' => '#47b2e4',    // Blue
            'training' => '#ff9800',   // Orange
            'deadline' => '#dc3545',   // Red
            'social' => '#6f42c1',     // Purple
            'holiday' => '#28a745',    // Green
        ];

        return $colors[$type] ?? '#47b2e4';
    }
}
