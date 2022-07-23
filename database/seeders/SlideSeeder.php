<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slide::truncate();
        Slide::factory()->create([
            'title'=> "APPORTEZ DE L'ÉCLAT À VOTRE GROSSESSE",
            'description'=> 'Des soins de beauté miracle pour régénérer votre peau',
            'product_id' => 2,
            'image' => '/images/slider1.jpg'
        ]);
        Slide::factory()->create([
            'title'=> 'OFFREZ-VOUS UNE ROUTINE BEAUTÉ LUXUEUSE, RELAXANTE, PUISSANTE ET EFFICACE.',
            'description'=> "Découvrez nos soins efficaces pour la peau, à base de la bave d'escargot et infusés d'une touche orientale.",
            'product_id' => 1,
            'image' => '/images/slider2.jpg'
        ]);
    }
}
