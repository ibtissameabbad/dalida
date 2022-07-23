<?php

namespace App\Http\Controllers;

use App\Http\Domain\Product\ProductService;
use App\Models\Campaign;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Stichoza\GoogleTranslate\GoogleTranslate;
class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resouProducte.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product/products', compact('products'));
    }

    public function informatiqueProducts()
    {
        $products = Product::where('category_id', 2)->get();
        return view('product.info', compact('products'));
    }

    public function cosmeticProducts()
    {
        $products = Product::where('category_id', 1)->get();
        return view('product.cosmetic', compact('products'));
    }




    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function addToCart(Request $request, int $id): JsonResponse
    {
        return $this->productService->addToCart($request, $id);
    }
    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function addToCartCategory(Request $request, int $id): JsonResponse
    {
        return $this->productService->addToCartCategory($request, $id);
    }

    public function updateCartCount(Request $request)
    {
        return $this->productService->updateCartCount($request);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart['campaign'][$request->id])) {
                unset($cart['campaign'][$request->id]);
                session()->put('cart', $cart);
            } elseif (isset($cart['product'][$request->id])) {
                unset($cart['product'][$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Element removed successfully');
        }
    }

    /**
     * Show the form for creating a new resouProducte.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resouProducte in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resouProducte.
     *
     * @param \App\Models\Product $product
     * @return Application|Factory|View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function show(Product $product)
    {
        return $this->productService->show($product);
    }

    /**
     * Show the form for editing the specified resouProducte.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resouProducte in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Product $product)
    // {
    //     //
    // }

    /**
     * Remove the specified resouProducte from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
