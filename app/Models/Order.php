<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_paid',
        'payment_receipt',
        'price',
        'confirmation',
        'reject_message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productReview()
    {
        return $this->hasOne(ProductReview::class);
    }

    public function service()
    {
        return $this->morphTo();
    }
}
