<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solde extends Model
{
    use HasFactory;

    protected $fillable = ['soldeable_id','soldeable_type','qte'];

    // public function produdcts()
    // {
    //     return $this->hasMany(Product::class);
    // }

    public function soldeable()
    {
        return $this->morphTo();
    }
}
