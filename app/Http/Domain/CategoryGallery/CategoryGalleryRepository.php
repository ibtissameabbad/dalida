<?php

namespace App\Http\Domain\CategoryGallery;


use App\Models\Category;
use App\Models\CategoryGallery;

class CategoryGalleryRepository
{
    public function save($filename, $categoryId)
    {
        return CategoryGallery::create([
           'path'=> '/storage/'.$filename,
           'category_id' => $categoryId
        ]);
    }
}
