<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slide extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','product_id', 'show'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
