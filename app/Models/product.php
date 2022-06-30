<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $appends = ['discounted_price'];

    public function getDiscountedPriceAttribute()
    {
        $price = $this->attributes['price'];
        $percentage = $this->attributes['product_discount'];
        return $price - ($price * $percentage/100);
    }
}
