<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    public $translatable = ['product_name', 'product_short_description', 'product_long_description',];

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class);
    }

    public function cart()
    {
        $this->hasMany(Cart::class);
    }

    public function orders()
    {
        $this->belongsToMany(Order::class);


    }

    public function productorder ()
    {
        return $this->hasMany(OrderProduct::class, 'product_id', 'id');
    }


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            $slug = $product->createSlug($product->product_name);
            $product->slug = $slug;
        });
    }

    public function createSlug($product)
    {
        $name = Str::ascii($product);
        $slug = Str::slug($name, '-');
        return $slug;
    }


}
