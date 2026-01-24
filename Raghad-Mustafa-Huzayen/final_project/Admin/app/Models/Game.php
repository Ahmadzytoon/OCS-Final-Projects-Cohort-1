<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'date',
        'time',
        'type',
        'max_players',
        'registered_players',
        'status',
    ];

    /**
     * Cast attributes to native types.
     * This is IMPORTANT for date formatting in Blade.
     */
    protected $casts = [
        'date' => 'date',
    ];
}
