<?php

namespace App\Http\Domain\Order;

use App\Http\Domain\OrderCategory\OrderCategoryRepository;
use App\Http\Domain\OrderProduct\OrderProductRepository;
use App\Mail\ClientConfirmation;
use App\Models\Product;
use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderService
{

    use ValidatesRequests;


    private OrderRepository $orderRepository;
    private OrderProductRepository $orderProductRepository;
    private OrderCategoryRepository $orderCategoryRepository;

    public function __construct(OrderRepository $orderRepository, OrderProductRepository $orderProductRepository, OrderCategoryRepository $orderCategoryRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->orderCategoryRepository = $orderCategoryRepository;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate(request(), [
            'shipping.firstname' => 'required|string|min:3|max:20',
            'shipping.lastname' => 'required|string|min:3|max:20',
            'shipping.email' => 'required|email|min:3',
            'shipping.city' => 'required',
            'shipping.address' => 'required|string|min:10',
            'shipping.telephone' => 'required|numeric|min:10',
        ]);

        $shipping = $request->get('shipping');
        $firstname = $shipping['firstname'];
        $lastname = $shipping['lastname'];
        $email = $shipping['email'];
        $telephone = $shipping['telephone'];
        $city = $shipping['city'];
        $address = $shipping['address'];
        $codePostal = $shipping['codePostal'];
        $total = $request->get('total');
        $currency = $request->get('currency');
        //store
        $order = $this->orderRepository->store($firstname, $lastname, $email, $telephone, $city, $address, $codePostal, $total, $currency);
        if (!$order)
            return response()->json([
                'success' => false,
                'errors' => 'Error in store'
            ]);
        // store products and caategories before forget sessioon cart
        if (isset($request->session()->get('cart')['product'])) {
            $storeProducts = $this->orderProductRepository->storeFromSession($request->session()->get('cart')['product'], $order->id, $currency);
            if (!$storeProducts)
                return response()->json([
                    'success' => false,
                    'errors' => 'Error in store products'
                ]);
        }
        // Order category store
        if (isset($request->session()->get('cart')['category'])) {
            $storeCategory = $this->orderCategoryRepository
                ->storeFromSession($request->session()->get('cart')['category'], $order->id, $currency);
            if (!$storeCategory)
                return response()->json([
                    'success' => false,
                    'errors' => 'Error in store products'
                ]);
        }
        //send mail
        $products = [];
        $categories = [];
        if (isset($request->session()->get('cart')['product']))
            $products = $request->session()->get('cart')['product'];
        if (isset($request->session()->get('cart')['category']))
            $categories = $request->session()->get('cart')['category'];
        // dd($products, $categories);

        $sendMail = $this->sendMailConfirmation($email, $firstname, $lastname, $order->id, $products, $categories, $total);
        if (!$sendMail)
            return response()->json([
                'success' => false,
                'errors' => "Erreur d'envoyer le mail"
            ]);
        // forget session cart
        $request->session()->forget('cart');
        return response()->json([
            'success' => true
        ]);
    }

    /**
     * @param string $email
     * @param string $firstname
     * @param string $lastname
     * @param $orderNumber
     * @param $products
     * @param $categories
     * @param $total
     * @return bool|void
     */
    public function sendMailConfirmation(string $email, string $firstname, string $lastname, $orderNumber, $products, $categories, $total)
    {
        $details = [
            'name' => $firstname . ' ' . $lastname,
            'orderNumber' => $orderNumber,
            'products' => $products,
            'categories' => $categories,
            'currency' => request()->currency,
            'total' => $total,
            'body' => 'This is for testing email using smtp'
        ];
        // dump($details);
        try {
            $mail = \Mail::to($email)->send(new ClientConfirmation($details));
            // dump($mail);
            if ((isset($mail->success) && $mail->success) || $mail === null) {
                return true;
            }
        } catch (Exception $e) {
            // dump($e->getMessage());
            return false;
        }
    }
}
