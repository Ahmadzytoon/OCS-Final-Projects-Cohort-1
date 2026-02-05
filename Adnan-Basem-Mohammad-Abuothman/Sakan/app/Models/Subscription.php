<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['owner_id', 'plan_id', 'start_date', 'end_date', 'status'];
}
