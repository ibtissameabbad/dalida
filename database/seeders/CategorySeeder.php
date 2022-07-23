<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::factory()->create([
            'id' => 1,
            'name' => 'Oriental Touch',
            'name_en' => 'Luxury Oud Body Pack',
            'slogan' => '',
            'description' => 'Offrez-vous un véritable voyage des sens avec ce magnifique pack corps, et découvrez le secret de la beauté orientale avec nos produits de véritable héritage oriental, offrant mille et une vertus à votre peau !            ',
            'image' => '/images/gammes/oriental-touch.png',
            'image_hover' => '/images/gammes/oriental-touch.png',
            'product_description' => "",
            'composition' => '',
            'using_advice' => '',
            'ingredients' => '',
            'starting_price_mad' => 699,
            'selling_price_mad' => 792,
            'starting_price_dollar' => 77.52,
            'selling_price_dollar' => 102.11,
            'starting_price_euro' => 70.47,
            'selling_price_euro' => 92.81,
        ]);
        Category::factory()->create([
            'id' => 2,
            'name' => 'la routine femme enceinte',
            'name_en' => 'Pregnancy Care Routine',
            'slogan' => '',
            'description' => "Doté d'une formule puissante avec une concentration élevée de la bave d'escargot, la routine soin de chez Dalida est spécialement conçue pour les femmes enceintes s'utilisent tout au long de la grossesse. En huile, crème, gommage, ils hydratent durablement et renforcent l'élasticité de la peau, pour prévenir les vergetures ou traiter les plus récentes.            ",
            'image' => "/images/gammes/soin-femme.jpg",
            'image_hover' => '/images/gammes/soin-femme.png',
            'product_description' => "",
            'composition' => '',
            'using_advice' => '',
            'ingredients' => '',
            'starting_price_mad' => 599,
            'selling_price_mad' => 708,
            'starting_price_dollar' => 67.17,
            'selling_price_dollar' => 90.46,
            'starting_price_euro' => 61.06,
            'selling_price_euro' => 82.24,
        ]);
        Category::factory()->create([
            'id' => 3,
            'name' => 'Total Lifting',
            'name_en' => 'Anti-Aging Pack',
            'slogan' => '',
            'description' => "Un duo de soins intègre de la bave d'escargot, un puissant peptide et un ingrédient resurfaçant pour retendre visiblement les traits, repulper la peau et lui redonner tonicité et fermeté.",
            'image' => '/images/gammes/total-lifting.png',
            'image_hover' => '/images/gammes/total-lifting.png',
            'product_description' => "",
            'composition' => '',
            'using_advice' => '',
            'ingredients' => '',
            'starting_price_mad' => 299,
            'selling_price_mad' => 364,
            'starting_price_dollar' => 71.56,
            'selling_price_dollar' => 100.04,
            'starting_price_euro' => 65.06,
            'selling_price_euro' => 90.94,
        ]);
        Category::factory()->create([
            'id' => 4,
            'name' => 'Honey Lips',
            'name_en' => 'Lip Care Duo',
            'slogan' => '',
            'description' => "Un duo de soins intègre de la bave d'escargot, un puissant peptide et un ingrédient resurfaçant pour retendre visiblement les traits, repulper la peau et lui redonner tonicité et fermeté.",
            'image' => '/images/gammes/honey-lips.png',
            'image_hover' => '/images/gammes/honey-lips.png',
            'product_description' => "",
            'composition' => '',
            'using_advice' => '',
            'ingredients' => '',
            'starting_price_mad' => 180,
            'selling_price_mad' => 204,
            'starting_price_dollar' => 71.56,
            'selling_price_dollar' => 100.04,
            'starting_price_euro' => 65.06,
            'selling_price_euro' => 90.94,
        ]);
    }
}
