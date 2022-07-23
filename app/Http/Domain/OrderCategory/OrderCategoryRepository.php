<?php

namespace App\Http\Domain\OrderCategory;

use App\Http\Domain\Category\CategoryRepository;
use App\Models\OrderCategory;

class OrderCategoryRepository
{

    private CategoryRepository $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * @param array $categories
     * @param int $orderId
     * @return bool
     */
    public function storeFromSession(array $categories, int $orderId, string $currency): bool
    {
        foreach ($categories as $category) {
            $orderCategory = OrderCategory::create([
                'order_id' => $orderId,
                'category_id' => $category['id'],
                'price' => $category['price'],
                'quantity' => $category['qte'],
                'currency' => $currency
            ]);
            $updateQteProduct = $this->categoryRepository->cutQuantity($category['id'], $category['qte']);
            if(!$updateQteProduct)
                return false;
            if(!$orderCategory)
                return false;
        }
        return true;
    }
}
