<?php

namespace App\Http\Domain\CategoryGallery;

use App\Models\Category;
use App\Models\CategoryGallery;

class CategoryGalleryService
{

    /**
     * @var CategoryGalleryRepository
     */
    private CategoryGalleryRepository $productGalleryRepository;

    public function __construct(CategoryGalleryRepository $productGalleryRepository)
    {
        $this->productGalleryRepository = $productGalleryRepository;
    }

    public function show(int $id)
    {
        $product = Category::with('category')->get()->find($id);
        return view('product/product', compact('product'));
    }

    public function save(string $filename, int $productId)
    {
        return $this->productGalleryRepository->save($filename, $productId);
    }

    public function destroy(int $categoryGallery)
    {
        $categoryGallery = CategoryGallery::find($categoryGallery);
        abort_if($categoryGallery === null, 400, 'Pas de gallerie');
        $delete = $categoryGallery->delete();
        unlink(storage_path('app/public/' . $categoryGallery->path));
        if ($delete)
            return response()->json([
                'success'=> true
            ]);
    }
}
