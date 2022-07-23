<?php

namespace App\Http\Domain\Cart;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartService
{

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function addToCartCategory(Request $request, int $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $count = $request->get('count');

        $cart = $request->session()->get('cart');
        $type = 'category';
        $price = $category->starting_price_mad;
        if (request()->currency === 'dollar')
            $price = $category->starting_price_dollar;
        if (request()->currency === 'euro')
            $price = $category->starting_price_euro;

        if (isset($cart['category'][$id])) {
            $cart['category'][$id]['qte'] = $cart['category'][$id]['qte'] + $count;
        } else {
            $cart['category'][$id] = [
                "id" => $category->id,
                "name" => $category->name,
                "description" => $category->description,
                "qte" => $count,
                "price" => $price,
                "image" => $category->image,
                "type" => $type
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'success' => true
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse|void
     */
    public function updateCategoryCartCount(Request $request)
    {
        $id = $request->get('id');
        $qte = $request->get('qte');
        if ($id && $qte) {
            $cart = session()->get('cart');
            $cart['category'][$id]["qte"] = $qte;
            session()->put('cart', $cart);
            return response()->json([
                'success' => true
            ]);
        }
    }

    public function total()
    {
        $total = 0;
        if (isset(session()->get('cart')['product'])) {
            $cartProduct = session()->get('cart')['product'];
            foreach ($cartProduct as $product) {
                $total = $total + $product['qte'] * $product['price'];
            }
        }
        if (isset(session()->get('cart')['category'])) {
            $cartCategory = session()->get('cart')['category'];
            foreach ($cartCategory as $category) {
                $total = $total + $category['qte'] * $category['price'];
            }
        }
        return response()->json([
            'success' => true,
            'data' => $total
        ]);
    }

    public
    function removeCategoryCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart['category'][$request->id])) {
                unset($cart['category'][$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Vous avez supprimer cette gamme');
        }
    }
}
