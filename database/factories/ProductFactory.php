<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
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
            'qte' => 100,
            'image' => 'images/' . $this->faker->image(storage_path('app/public/images'),400,300, null, false),
            'category_id' => $this->faker->numberBetween(1,3),
            'user_id' => $this->faker->numberBetween(1,2),
            'slogan' => '',
            'using_advice' => $this->faker->text(),
            'composition' => '',
            'shipping' => 'Livraison 2 à 3 jours ouvrables'
        ];
    }
}
