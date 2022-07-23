<?php

namespace App\Http\Domain\Slide;

use App\Models\Category;
use App\Models\Slide;

class SlideRepository
{

    public function store($title, $description, $product, bool $show, $imageFile, $hasImage)
    {
        $slide = new Slide();
        $slide->title = $title;
        $slide->description = $description;
        $slide->show = $show == 'true';
        $slide->product_id = $product;
        if ($hasImage) {
            $slide->image = '/storage/'.$imageFile->store('images', 'public');
        }
        return $slide->save();
    }

    public function update(Slide $slide, $title, $description, $product, bool $show, $imageFile, $hasImage): bool
    {
        $slide->title = $title;
        $slide->description = $description;
        $slide->show = $show == 'true';
        $slide->product_id = $product;
        if ($hasImage) {
            $slide->image = '/storage/'.$imageFile->store('images', 'public');
        }
        return $slide->save();
    }
}
