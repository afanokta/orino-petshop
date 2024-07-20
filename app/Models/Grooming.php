<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grooming extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'owner',
        'address',
        'phone_number',
        'pet_name',
        'pet_gender',
        'pet_age',
        'sinyalement',
        'equipment',
        'grooming_schedule_id',
        'note',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->morphOne(Order::class, 'service');
    }

    public function schedule() {
        return $this->belongsTo(GroomingSchedule::class, 'grooming_schedule_id');
    }
}
