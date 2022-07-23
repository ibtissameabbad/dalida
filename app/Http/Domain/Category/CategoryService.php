<?php

namespace App\Http\Domain\Category;


use App\Http\Domain\CategoryGallery\CategoryGalleryService;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class CategoryService
{
    use ValidatesRequests;

    private CategoryGalleryService $categoryGalleryService;

    public function __construct(CategoryGalleryService $categoryGalleryService)
    {
        $this->categoryGalleryService = $categoryGalleryService;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, int $category)
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'shipping' => 'required',
            'selling_price_mad' => 'required|numeric',
//            'starting_price_mad' => 'required|numeric',
            'selling_price_dollar' => 'required|numeric',
//            'starting_price_dollar' => 'required|numeric',
            'selling_price_euro' => 'required|numeric',
//            'starting_price_euro' => 'required|numeric',
            'qte' => 'required|numeric',
        ]);
        $category = Category::find($category);
        $name = $request->get('name');
        $name_en = $request->get('name_en');
        $description = $request->get('description');
        $slogan = $request->get('slogan');
        $using_advice = $request->get('using_advice');
        $composition = $request->get('composition');
        $shipping = $request->get('shipping');
        $product_description = $request->get('product_description');
        $ingredients = $request->get('ingredients');
        $qte = $request->get('qte');
        $image = $request->hasFile('image');
        $image_hover = $request->hasFile('image_hover');

        $category->name = $name;
        $category->name_en = $name_en;
        $category->description = $description;
        $category->slogan = $slogan;
        $category->using_advice = $using_advice;
        $category->selling_price_mad = $request->selling_price_mad;
        $category->starting_price_mad = $request->starting_price_mad;
        $category->selling_price_dollar = $request->selling_price_dollar;
        $category->starting_price_dollar = $request->starting_price_dollar;
        $category->selling_price_euro = $request->selling_price_euro;
        $category->starting_price_euro = $request->starting_price_euro;
        $category->composition = $composition;
        $category->shipping = $shipping;
        $category->product_description = $product_description;
        $category->ingredients = $ingredients;
        $category->qte = $qte;
        if ($image) {
            $category->image = '/storage/' . $request->file('image')->store('images', 'public');
        }
        if ($image_hover) {
            $category->image_hover = '/storage/' . $request->file('image_hover')->store('images', 'public');
        }
        $category->save();


        if ($request->hasFile('gallery')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png'];
            $files = $request->file('gallery');
            foreach ($files as $file) {
                //                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $file->store('galleries', 'public');
                    $this->categoryGalleryService->save($filename, $category->id);
                }
            }
        }

        $request->session()->flash('status', 'Vous avez modifier la gamme de produit!');
        return redirect()->route('admin-category');
    }

    public function show(Category $category)
    {
        $category = Category::with('products', 'galleries')->get()->find($category);
        $anotherCategories = Category::where('id', '<>', $category->id)->get();
        $setting = Setting::find(1);
        $tr = new GoogleTranslate(session()->get('locale'));
        return view('category/category', compact('category', 'anotherCategories', 'setting', 'tr'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate(request(), [
            'name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $name = $request->get('name');
        $show = $request->has('show');
        $image = $request->get('image');
        $category = new Category();
        $category->name = $request->name;
        $category->show = $request->show === 'true';
        if ($request->hasFile('image')) {
            $category->image = '/storage/' . $request->file('image')->store('images', 'public');

        }
        $category->save();

        $request->session()->flash('status', 'Category was created successfully !');
        return redirect()->route('admin-category');
    }

}
