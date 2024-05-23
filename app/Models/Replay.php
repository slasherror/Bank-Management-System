<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replay extends Model
{
    use HasFactory;

    protected $fillable = ['feedback_id', 'message'];

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}
