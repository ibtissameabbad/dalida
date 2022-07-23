<?php

namespace App\Http\Controllers;

use App\Http\Domain\Cart\CartService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Models\Setting;
class CartController extends Controller
{
    private CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function total()
    {
        return $this->cartService->total();
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function addToCartCategory(Request $request, int $id): JsonResponse
    {
        return $this->cartService->addToCartCategory($request, $id);
    }

    /**
     * Write code on Method
     *
     * @return response|Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function cart()
    {
//        dd(session()->get('cart'));
        $setting = Setting::find(1);
        return view('product.cart' ,compact('setting'));
    }

    public function updateCategoryCartCount(Request $request)
    {
        return $this->cartService->updateCategoryCartCount($request);
    }
    public function removeCategoryCart(Request $request) {

        return $this->cartService->removeCategoryCart($request);
    }
}
