<?php

namespace App\Http\Domain\Checkout;

use App\Http\Domain\Order\OrderService;
use App\Models\Product;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CheckoutService
{

    use ValidatesRequests;

    /**
     * @var OrderService
     */
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    public function store(Request $request)
    {
        return $this->orderService->store($request);
    }

}
