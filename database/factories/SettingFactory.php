<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'instagram' => 'dalida.ma',
            'facebook' => 'Dalida-Beauty-106456392033664',
            'youtube' => 'dalida',
        ];
    }
}
