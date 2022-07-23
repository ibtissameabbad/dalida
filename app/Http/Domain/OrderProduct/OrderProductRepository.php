<?php

namespace App\Http\Domain\OrderProduct;

use App\Http\Domain\Product\ProductRepository;
use App\Models\Order;
use App\Models\OrderProduct;

class OrderProductRepository
{
    private ProductRepository $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    /**
     * @param array $products
     * @param int $orderId
     * @return bool
     */
    public function storeFromSession(array $products, int $orderId, string $currency): bool
    {
        foreach ($products as $product) {
            $orderProduct = OrderProduct::create([
                'order_id' => $orderId,
                'product_id' => $product['id'],
                'price' => $product['price'],
                'quantity' => $product['qte'],
                'currency' => $currency
            ]);
            $updateQteProduct = $this->productRepository->cutQuantity($product['id'], $product['qte']);
            if(!$updateQteProduct) {
                return false;
            }
            if(!$orderProduct)
                return false;
        }
        return true;
    }
}
