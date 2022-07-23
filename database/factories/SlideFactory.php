<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'image' => 'images/' . $this->faker->image(storage_path('app/public/images'),400,300, null, false),
            'description' => $this->faker->text(),
            'product_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
