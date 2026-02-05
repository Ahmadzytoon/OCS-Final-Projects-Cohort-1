<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['student_id', 'apartment_id', 'message', 'status'];



    // Request.php
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }


}
