<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'selling_price_mad',
        'starting_price_mad',
        'selling_price_dollar',
        'starting_price_dollar',
        'selling_price_euro',
        'starting_price_euro',
        'qte',
        'image',
        'image_hover',
        'product_description',
        'ingredients',
        'slogan',
        'using_advice',
        'composition'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(CategoryGallery::class);
    }
}
