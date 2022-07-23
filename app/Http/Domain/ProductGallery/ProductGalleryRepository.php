<?php

namespace App\Http\Domain\ProductGallery;

use App\Models\ProductGallery;

class ProductGalleryRepository
{
    public function save($filename, $productId)
    {
        $store = ProductGallery::create([
           'path'=> $filename,
           'product_id' => $productId
        ]);
        return $store;
    }
}
