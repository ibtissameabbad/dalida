<?php
namespace App\Http\Domain\Product;
use App\Models\Product;

class ProductRepository
{

    public function cutQuantity(int $id, int $qte)
    {
        $product = Product::find($id);
        $product->qte -= $qte;
        return $product->save();
    }
}
