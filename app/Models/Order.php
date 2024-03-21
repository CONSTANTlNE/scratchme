<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function products(){

        return $this->belongsToMany(Product::class);
    }

    public function couponDiscount(){

        return $this->belongsTo(CouponDiscount::class, 'coupon_discount_id', 'id');
    }

    public function delivery(){

        return $this->belongsTo(Delivery::class, 'delivery_id', 'id');
    }

    public function pivot(){

        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
}
