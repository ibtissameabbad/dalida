<?php

namespace App\Http\Domain\Slide;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SlideService
{

    use ValidatesRequests;

    /**
     * @var SlideRepository
     */
    private SlideRepository $slideRepository;

    public function __construct(SlideRepository $slideRepository)
    {
        $this->slideRepository = $slideRepository;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'product' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $title = $request->get('title');
        $description = $request->get('description');
        $product = $request->get('product');
        $show = $request->has('show');
        $imageFile = $request->file('image');
        $hasImage = $request->hasFile('image');

        $this->slideRepository->store($title, $description, $product, $show, $imageFile, $hasImage);

        $request->session()->flash('status', 'Vous avez ajouter ce Slide');
        return redirect()->route('admin-slide');
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Slide $slide)
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'product' => 'required',
        ]);
        $title = $request->get('title');
        $description = $request->get('description');
        $product = $request->get('product');
        $show = $request->has('show');
        $imageFile = $request->file('image');
        $hasImage = $request->hasFile('image');
        $this->slideRepository->update($slide, $title, $description, $product, $show, $imageFile, $hasImage);

        $request->session()->flash('status', 'vous avez modifier le slide');
        return redirect()->route('admin-slide');
    }

}
