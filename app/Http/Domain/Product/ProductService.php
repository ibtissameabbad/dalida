<?php

namespace App\Http\Domain\Product;

use App\Http\Domain\ProductGallery\ProductGalleryService;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ProductService
{

    use ValidatesRequests;

    /**
     * @var ProductGalleryService
     */
    private ProductGalleryService $productGalleryService;

    public function __construct(ProductGalleryService $productGalleryService)
    {
        $this->productGalleryService = $productGalleryService;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function show(Product $product)
    {
        $product = Product::with('category', 'galleries')->get()->find($product);
        $anotherProducts = Product::where('id', '<>', $product->id)
            ->orderBy('updated_at')->limit(8)->get();
        $setting = Setting::find(1);
        $tr = new GoogleTranslate(session()->get('locale'));
        return view('product/product', compact('product', 'anotherProducts', 'setting', 'tr'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'selling_price_mad' => 'required|numeric',
//            'starting_price_mad' => 'required|numeric',
            'selling_price_dollar' => 'required|numeric',
//            'starting_price_dollar' => 'required|numeric',
            'selling_price_euro' => 'required|numeric',
//            'starting_price_euro' => 'required|numeric',
            'qte' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'category' => 'required'
        ]);

        $category = $request->get('category');
        $slogan = $request->get('slogan');

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->selling_price_mad = $request->selling_price_mad;
        $product->starting_price_mad = $request->starting_price_mad;
        $product->selling_price_dollar = $request->selling_price_dollar;
        $product->starting_price_dollar = $request->starting_price_dollar;
        $product->selling_price_euro = $request->selling_price_euro;
        $product->starting_price_euro = $request->starting_price_euro;
        $product->qte = $request->qte;
        $product->slogan = $slogan;
        $product->category_id = $category;

        if ($request->hasFile('image')) {
            $product->image = '/storage/' . $request->file('image')->store('images', 'public');
        }

        $product->save();

        if ($request->hasFile('gallery')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png'];
            $files = $request->file('gallery');
            foreach ($files as $file) {
                //                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $file->store('galleries', 'public');
                    $this->productGalleryService->save($filename, $product->id);
                }
            }
        }
        $request->session()->flash('status', 'Product was created successfully !');
        return redirect()->route('products');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'selling_price_mad' => 'required|numeric',
//            'starting_price_mad' => 'required|numeric',
            'selling_price_dollar' => 'required|numeric',
//            'starting_price_dollar' => 'required|numeric',
            'selling_price_euro' => 'required|numeric',
//            'starting_price_euro' => 'required|numeric',
            'qte' => 'required|numeric',
            'category' => 'required'
        ]);

        $product = Product::findOrFail($id);
        $name = $request->get('name');
        $name_en = $request->get('name_en');
        $description = $request->get('description');
        $using_advice = $request->get('using_advice');
        $composition = $request->get('composition');
        $qte = $request->get('qte');
        $category = $request->get('category');
        $image = $request->hasFile('image');
        // Insert
        $product->selling_price_mad = $request->selling_price_mad;
        $product->starting_price_mad = $request->starting_price_mad;
        $product->selling_price_dollar = $request->selling_price_dollar;
        $product->starting_price_dollar = $request->starting_price_dollar;
        $product->selling_price_euro = $request->selling_price_euro;
        $product->starting_price_euro = $request->starting_price_euro;
        $product->name = $name;
        $product->name_en = $name_en;
        $product->description = $description;
        $product->using_advice = $using_advice;
        $product->composition = $composition;
        $product->qte = $qte;
        $product->category_id = $category;
        if ($image) {
            $product->image = '/storage/' . $request->file('image')->store('images', 'public');
        }
        $product->save();


        if ($request->hasFile('gallery')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png'];
            $files = $request->file('gallery');
            foreach ($files as $file) {
                //                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $file->store('galleries', 'public');
                    $this->productGalleryService->save($filename, $product->id);
                }
            }
        }
        $request->session()->flash('status', 'Vous avez modifier ce produit');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function addToCart(Request $request, int $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $count = $request->get('count');
        $cart = $request->session()->get('cart');
        $type = 'product';

        $price = $product->starting_price_mad === null ? $product->selling_price_mad : $product->starting_price_mad;
        if (request()->currency === 'dollar')
            $price = $product->starting_price_dollar === null ? $product->selling_price_dollar : $product->starting_price_dollar;
        if (request()->currency === 'euro')
            $price = $product->starting_price_euro === null ? $product->selling_price_euro : $product->starting_price_euro;
        // if product exist in cart
        if (isset($cart['product'][$id])) {
            $cart['product'][$id]['qte'] = $cart['product'][$id]['qte'] + $count;
        } else {
            $cart['product'][$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "description" => $product->description,
                "qte" => $count,
                "price" => $price,
                "image" => $product->image,
                "type" => $type
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'success' => true
        ]);
    }

    public function updateCartCount(Request $request)
    {
        $id = $request->get('id');
        $qte = $request->get('qte');
        if ($id && $qte) {
            $cart = session()->get('cart');
            $cart['product'][$id]["qte"] = $qte;
            session()->put('cart', $cart);
            return response()->json([
                'success' => true
            ]);
        }
    }
}
