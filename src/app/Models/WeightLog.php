<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'weight',
        'calorie_intake',
        'exercise_time',
        'exercise_content',
    ];

    protected $casts = [
        'date' => 'date',
        'weight' => 'decimal:1',
        'calorie_intake' => 'integer',
        'exercise_time' => 'datetime:H:i',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
