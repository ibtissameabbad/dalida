<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'product_description' => $this->faker->text(),
            'ingredients' => $this->faker->text(),
            'qte' => 100,
            'image' => 'images/' . $this->faker->image(storage_path('app/public/images'),400,300, null, false),
            'image_hover' => 'images/' . $this->faker->image(storage_path('app/public/images'), 400, 300, null, false),
            'slogan' => $this->faker->name(),
            'using_advice' => $this->faker->text(),
            'composition' => $this->faker->text(),
            'show'=> true,
            'shipping' => 'Livraison 2 à 3 jours ouvrables',
            'shipping_en' => 'Delivery 2 to 3 Days',
        ];
    }
}
