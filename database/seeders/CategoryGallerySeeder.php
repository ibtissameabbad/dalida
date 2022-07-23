<?php

namespace Database\Seeders;

use App\Models\CategoryGallery;
use Illuminate\Database\Seeder;

class CategoryGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        CategoryGallery::truncate();

        CategoryGallery::factory()->create([
            'path' => '/images/products/gel-nettoyant.png',
            'category_id' => 1
        ]);
        CategoryGallery::factory()->create([
            'path' => '/images/products/mask-anti-acne.png',
            'category_id' => 1
        ]);
        CategoryGallery::factory()->create([
            'path' => '/images/products/creme-anti-acne.png',
            'category_id' => 1
        ]);
        CategoryGallery::factory()->create([
            'path' => '/images/products/ecran-solaire.png',
            'category_id' => 1
        ]);
        // cat 2
        CategoryGallery::factory()->create([
            'path' => '/images/products/creme-de-nuit.png',
            'category_id' => 2
        ]);
        CategoryGallery::factory()->create([
            'path' => '/images/products/creme-eclat-du-jour.png',
            'category_id' => 2
        ]);
        CategoryGallery::factory()->create([
            'path' => '/images/products/eau-micelaire.png',
            'category_id' => 2
        ]);
        CategoryGallery::factory()->create([
            'path' => '/images/products/serum-des-yeux.png',
            'category_id' => 2
        ]);
        // cat 3
        CategoryGallery::factory()->create([
            'path' => '/images/products/mask-regenereux.png',
            'category_id' => 3
        ]);
        CategoryGallery::factory()->create([
            'path' => '/images/products/shampooing-regenereux.png',
            'category_id' => 3
        ]);
        CategoryGallery::factory()->create([
            'path' => '/images/products/lotion-regenerant.png',
            'category_id' => 3
        ]);
        CategoryGallery::factory()->create([
            'path' => '/images/products/serum-regenerant.png',
            'category_id' => 3
        ]);
    }
}
