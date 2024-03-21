<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function order(){

        return $this->hasMany(Order::class, 'delivery_id', 'id');
    }

    public function prices()
    {
        return $this->hasMany(DeliveryPrice::class, 'delivery_id', 'id');
    }
}
