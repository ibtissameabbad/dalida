<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['firstname', 'lastname', 'email', 'telephone', 'address', 'code_postal', 'city', 'total', 'currency'];

    public function orderCategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderCategory::class);
    }
    public function orderProducts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }
}
