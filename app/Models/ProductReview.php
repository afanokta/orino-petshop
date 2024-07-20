<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'kualitas', 'pelayanan', 'harga', 'order_id'
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
