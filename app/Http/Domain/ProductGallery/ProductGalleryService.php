<?php

namespace App\Http\Domain\ProductGallery;

use App\Models\Product;
use App\Models\ProductGallery;
use const http\Client\Curl\PROXY_HTTP;

class ProductGalleryService
{

    /**
     * @var ProductGalleryRepository
     */
    private ProductGalleryRepository $productGalleryRepository;

    public function __construct(ProductGalleryRepository $productGalleryRepository)
    {
        $this->productGalleryRepository = $productGalleryRepository;
    }
    public function show(int $id)
    {
        $product = Product::with('category')->get()->find($id);
        return view('product/product', compact('product'));
    }

    public function save(string $filename, int $productId)
    {
        return $this->productGalleryRepository->save($filename, $productId);
    }

    public function destroy(int $productGallery)
    {
        $productGallery = ProductGallery::find($productGallery);
        abort_if($productGallery === null, 400, 'Pas de gallerie');
        $delete = $productGallery->delete();
        unlink(storage_path('app/public/' . $productGallery->path));
        if ($delete)
            return response()->json([
                'success'=> true
            ]);
        //        return redirect()->back();
    }
}
