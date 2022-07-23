<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
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
            'price' => $this->faker->numberBetween(100,900),
            'qte' => $this->faker->numberBetween(1,20),
            'image' => $this->faker->image('public/storage/images',400,300, null, false),
            'product_name' => $this->faker->name(),
            'left_label' => 'INFINITI MEGA RAFFLE',
            'right_label' => 'EXCLUSIVE DSF LAUNCH',
        ];
    }
}
