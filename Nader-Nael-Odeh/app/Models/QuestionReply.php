<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionReply extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'question_id',
        'lawyer_id',
        'body',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function lawyer()
    {
        return $this->belongsTo(User::class, 'lawyer_id');
    }
    
}
