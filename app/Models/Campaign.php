<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = ['name','description', 'price','qte','image','product_name','left_label','right_label'];

    public function soldes()
    {
        return $this->morphMany(Solde::class, 'soldeable');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}

