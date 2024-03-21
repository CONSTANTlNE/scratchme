<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPrice extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function delivery   (){

     return    $this->belongsTo(Delivery::class, 'delivery_id', 'id');
    }
}
