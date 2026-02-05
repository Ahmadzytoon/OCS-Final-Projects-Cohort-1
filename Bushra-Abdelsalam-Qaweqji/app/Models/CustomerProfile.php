<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CustomerProfile extends Model
{

    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'int';
    
    protected $fillable = [
        'user_id',
        'zip_code',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
