<?php

namespace App\Http\Domain\Order;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderRepository
{

    public function store($firstname, $lastname, $email, $telephone, $city, $address, $codePostal, $total, $currency)
    {
        $orderId = Order::create([
            'firstname'=> $firstname,
            'lastname'=> $lastname,
            'email'=> $email,
            'telephone'=> $telephone,
            'city' => $city,
            'address' => $address,
            'codePostal' => $codePostal,
            'total' => $total,
            'currency' => $currency
        ]);
        return $orderId;
    }
}
