<?php
namespace App\Http\Domain\Category;
use App\Models\Category;

class CategoryRepository
{

    public function cutQuantity(int $id, int $qte)
    {
        $category = Category::find($id);
        $category->qte -= $qte;
        return $category->save();
    }
}
