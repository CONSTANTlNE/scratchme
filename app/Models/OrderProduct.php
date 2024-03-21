<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_product';

    protected $guarded = [];

    public function prices(){

        return $this->belongsTo(Price::class, 'price_id', 'id');
    }

    public function orderproducts(){

        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function order(){

        return $this->belongsTo(Order::class, 'order_id', 'id');
    }



}
