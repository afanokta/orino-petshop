<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroomingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'session',
        'session_end',
    ];

    protected $casts = [
        'session' => 'datetime:H:i',
        'session_end' => 'datetime:H:i',
    ];

    public function grooming() {
        return $this->hasOne(Grooming::class);
    }
}
