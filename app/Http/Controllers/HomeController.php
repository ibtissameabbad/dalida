<?php

namespace App\Http\Controllers;

use App\Http\Domain\Instagram\InstagramService;
use App\Models\Category;
use App\Models\Product;
use App\Models\Campaign;
use App\Models\Setting;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Stichoza\GoogleTranslate\GoogleTranslate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    private InstagramService $instagramService;

    /**
     * @param InstagramService $instagramService
     */
    public function __construct(InstagramService $instagramService)
    {
        $this->instagramService = $instagramService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::paginate(4);
        $categories = Category::limit(4)->orderBy('updated_at', 'desc')->with('products')->get();
        $categoriesAsc = Category::limit(4)->orderBy('id', 'asc')->with('products')->get();
        $slides = Slide::where('show', true)->orderBy('updated_at', 'desc')->with('product')->get();
        $setting = Setting::find(1);
//        $instagramImages = $this->instagramService->getLatestImages();
        // var_dump(isset(session('cart')['campaign']));

        $tr = new GoogleTranslate(session()->get('locale'));
        return view('home', [
            'products' => $products,
            'categories' => $categories,
            'categoriesAsc' => $categoriesAsc,
            'slides' => $slides,
            'setting' => $setting,
            'tr' => $tr
//            'instagramImages' => $instagramImages
        ]);
    }

    public function ourHistory()
    {
        $setting = Setting::find(1);
        return view('our-history', compact('setting'));
    }
}
