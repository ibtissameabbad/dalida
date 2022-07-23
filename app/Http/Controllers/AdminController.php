<?php

namespace App\Http\Controllers;

use App\Http\Domain\Product\ProductService;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * @var ProductService
     */
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function dashboard()
    {
        $products = Product::orderBy("id", "desc")->get();
        $categories = Category::orderBy("id", "desc")->get();
        $orders = Order::orderBy("id", "desc")->get();
        return view('admin.dashboard', [
            'products' => $products,
            'categories' => $categories,
            'orders' => $orders,
        ]);
    }

    //Product Methods
    public function products()
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(6);
//        dd($products);
        return view('admin.products', [
            'products' => $products,
        ]);
    }

    public function addProduct()
    {
        return view('admin.product.addProduct');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeProduct(Request $request): \Illuminate\Http\RedirectResponse
    {
        return $this->productService->store($request);
    }

    public function editProduct($id)
    {
        $product = Product::with('galleries')->findOrFail($id);
        return view('admin.product.editProduct', ['product' => $product]);
    }

    public function updateProduct(Request $request, $id)
    {
        return $this->productService->update($request, $id);
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products');
    }

    //Campaign Methods
    public function campaigns()
    {
        $campaigns = Campaign::orderBy('updated_at', 'desc')->paginate(6);
        return view('admin.campaigns', [
            'campaigns' => $campaigns,
        ]);
    }

    public function addCampaign()
    {
        return view('admin.campaign.addCampaign');
    }

    public function storeCampaign(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'qte' => 'required|numeric',
            'product_name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $campaign = new Campaign();
        $campaign->name = $request->name;
        $campaign->description = $request->description;
        $campaign->price = $request->price;
        $campaign->qte = $request->qte;
        $campaign->product_name = $request->product_name;
        $campaign->left_label = $request->left_label;
        $campaign->right_label = $request->right_label;
        if ($request->hasFile('image')) {
            $campaign->image = $request->file('image')->store('images', 'public');
        }
        $campaign->save();

        $request->session()->flash('status', 'Campaign was created successfully !');
        return redirect()->route('campaigns');
    }

    public function editCampaign($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('admin.campaign.editCampaign', ['campaign' => $campaign]);
    }

    public function showCampaign($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('admin.campaign.show', ['campaign' => $campaign]);
    }

    public function updateCampaign(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'qte' => 'required|numeric',
            'product_name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $campaign = Campaign::findOrFail($id);
        $campaign->name = $request->name;
        $campaign->description = $request->description;
        $campaign->price = $request->price;
        $campaign->qte = $request->qte;
        $campaign->product_name = $request->product_name;
        $campaign->left_label = $request->left_label;
        $campaign->right_label = $request->right_label;
        if ($request->hasFile('image')) {
            $campaign->image = $request->file('image')->store('images', 'public');
        }
        $campaign->save();

        $request->session()->flash('status', 'Campaign was updated successfully !');
        return redirect()->route('campaigns');

    }

    public function deleteCampaign($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();
        return redirect()->route('campaigns');
    }
}
