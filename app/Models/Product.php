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
    use HasFactory , InteractsWithMedia,HasTranslations;



    public $translatable = ['product_name','product_short_description','product_long_description',];

    public function prices(){
     return   $this->hasMany(Price::class);
    }

    public function features(){
        return $this->hasMany(ProductFeature::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            // Generate a slug for the article based on its title
            $slug = $product->createSlug($product->product_name);
            // Assign the generated slug to the article
            $product->slug = $slug;
        });
    }

    /**
     * Create a slug from the given title.
     *
     * @param string $product The title to create a slug from
     * @return string The generated slug
     */
    private function createSlug($product)
    {
        // Convert non-Latin characters to their closest ASCII equivalents
        $name = Str::ascii($product);

        // Replace spaces with dashes and lowercase the title
        $slug = Str::slug($name, '-');

        return $slug;
    }
}
