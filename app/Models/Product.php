<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'selling_price_mad','starting_price_mad','selling_price_dollar','starting_price_dollar','selling_price_euro','starting_price_euro', 'qte', 'image', 'category_id', 'slogan', 'using_advice', 'composition'];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function soldes(): MorphMany
    {
        return $this->morphMany(Solde::class, 'soldeable');
    }
}
