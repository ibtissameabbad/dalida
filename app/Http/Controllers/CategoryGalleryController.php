<?php

namespace App\Http\Controllers;

use App\Http\Domain\CategoryGallery\CategoryGalleryService;
use App\Models\CategoryGallery;
use Illuminate\Http\Request;

class CategoryGalleryController extends Controller
{
    private CategoryGalleryService $categoryGalleryService;
    public function __construct(CategoryGalleryService $categoryGalleryService)
    {
        $this->categoryGalleryService = $categoryGalleryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryGallery  $categoryGallery
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryGallery $categoryGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryGallery  $categoryGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryGallery $categoryGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryGallery  $categoryGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryGallery $categoryGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $categoryGallery
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|void
     */
    public function destroy(int $categoryGallery)
    {
        return $this->categoryGalleryService->destroy($categoryGallery);
    }
}
