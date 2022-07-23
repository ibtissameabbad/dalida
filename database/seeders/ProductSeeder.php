<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        Product::factory()->create([
            'name' => 'Huile anti-vergetures',
            'name_en' => 'Anti-stretch Mark Oil',
            'description' => "Un soin spécialement formulé pour la femme enceinte à base de la bave d'escargot permet de prévenir l'apparition des vergetures récentes grâce au collagène qui stimule le métabolisme cellulaire, raffermit et tonifie la peau en augmentant sa souplesse et son élasticité.",
            'using_advice' => "Appliquez l'Huile, idéalement le soir en massages circulaires sur les zones concernées telles que le ventre, les hanches, les fesses, les cuisses et les seins. Un rituel soir idéal pour prévenir la formation de vergetures.",
            'selling_price_mad' => 167,
            'starting_price_mad' => 150,
            'selling_price_dollar' => 22.65,
            'starting_price_dollar' => 16.18 ,
            'selling_price_euro' => 20.59,
            'starting_price_euro' => 14.71,
            'image' => '/images/products/routine-soin-anti-vergetures.png',
            'category_id'=> 2,
            'user_id'=> 1
        ]);
        Product::factory()->create([
            'name' => "Crème Visage Éclaircissante Anti Taches ",
            'name_en' => 'Anti-Spot Brightening Face Cream',
            'description' => "Formulée à base de la bave d'escargot, reconnue pour ses propriétés antitaches, apaisantes et antioxydantes, cette crème éclaircissante permet d'homogénéiser la pigmentation, qui luttent contre la dérégulation du teint, la rugosité cutanée, les rides et la déshydratation.",
            'using_advice' => "Appliquez la crème sur le visage et le cou. Sur une peau propre et sèche.",
            'selling_price_mad' => 197,
            'starting_price_mad' => 177,
            'selling_price_dollar' => 27.18,
            'starting_price_dollar' => 19.54,
            'selling_price_euro' => 24.71,
            'starting_price_euro' => 17.76,
            'image' => '/images/products/routine-soin-creme-visage.png',
            'category_id'=> 2,
            'user_id'=> 1
        ]);
        Product::factory()->create([
            'name' => 'Gommage anti-vergetures',
            'name_en' => 'Anti-stretch Mark Scrub',
            'description' => " Un gommage ultra réconfortant qui permet de prévenir et atténuer les vergetures. L'action mécanique des graines d'argan permet d'éliminer toutes les impuretés, le collagène et l'élastine contenues dans la bave d'escargot sont l'origine de l'élimination des vergetures en augmentant la souplesse et l'élasticité de la peau.",
            'using_advice' => "Appliquez une grosse noisette de gommage et massez en mouvements circulaires. Rincez à l'eau claire. Utilisez 2 à 3 fois par semaine pour obtenir le meilleur résultat.",
            'selling_price_mad' => 147,
            'starting_price_mad' => 132,
            'selling_price_dollar' => 25.24,
            'starting_price_dollar' => 18.38,
            'selling_price_euro' => 22.94,
            'starting_price_euro' => 16.71,
            'image' => '/images/products/routine-soin-gommage.png',
            'category_id'=> 2,
            'user_id'=> 1
        ]);
        Product::factory()->create([
            'name' => 'Huile de Massage Anti-Douleurs',
            'name_en' => 'Pain Relief Massage Oil',
            'description' => "Riche en huiles essentielles, cette huile de massage permet de soulager les maux de dos et les douleurs musculaires pendant la grossesse. Elle contient de la bave d'escargot reconnue pour ses vertus apaisantes et hydratantes. Cette huile pacifiante transcende le massage en un moment de bien-être et de détente.",
            'using_advice' => "Appliquez matin et soir sur l’ensemble du visage. Massez en douceur jusqu'à absorption complète.",
            'selling_price_mad' => 197,
            'starting_price_mad' => 177,
            'selling_price_dollar' => 26.53,
            'starting_price_dollar' => 20.06,
            'selling_price_euro' => 24.12,
            'starting_price_euro' => 18.24,
            'image' => '/images/products/routine-soin-huile-massage.png',
            'category_id'=> 2,
            'user_id'=> 1
        ]);
        // gamme Oriental Touch
        Product::factory()->create([
            'name' => "Crème Hydratation",
            'name_en' => 'Deep Moisturizing Cream',
            'description' => "Une crème adaptée aux peaux sensibles sujettes aux irritations. Formulée à base de la bave d'escargot et de l'huile d'argan marocaine pure, ce soin permet d'hydrater, protéger la peau en minimisant les tâches d'hyperpigmentation.",
            'using_advice' => "Appliquez la crème en fine couche sur une peau propre et sèche une à deux fois par jour ou plus si nécessaire.",
            'selling_price_mad' => 247,
            'starting_price_mad' => null,
            'selling_price_dollar' => 20.58,
            'starting_price_dollar' => 17.21,
            'selling_price_euro' =>18.71 ,
            'starting_price_euro' => 15.65,
            'image' => '/images/products/gommage-corporel-creme1.png',
            'category_id'=> 1,
            'user_id'=> 1
        ]);
        Product::factory()->create([
            'name' => "Brume Corps",
            'name_en' => 'Body Mist',
            'description' => "Apportez à votre peau un délicat parfum à la senteur agréable de Oud Royal. C’est une brume unique qui vous fera vous sentir puissant, présent et glorieux.",
            'using_advice' => "Vaporisez la brume sur votre corps pour vous envelopper de parfum.",
            'selling_price_mad' => 297,
            'starting_price_mad' => null,
            'selling_price_dollar' => 37.40,
            'starting_price_dollar' => 27.56,
            'selling_price_euro' => 34.00,
            'starting_price_euro' => 25.06,
            'image' => '/images/products/gommage-corporel-brume.png',
            'category_id'=> 1,
            'user_id'=> 1
        ]);
        Product::factory()->create([
            'name' => "Enveloppement Corporel au Ghassoul",
            'name_en' => 'Ghassoul Body Wrap',
            'description' => "L’enveloppement Ghassoul au Royal Oud est un soin indispensable dans votre rituel Hammam. Un soin apaisant alliant la richesse de l’huile d’argan, la douceur de la bave d'escargot et les propriétés purifiantes du ghassoul. Il agit tout en douceur et laisse une peau propre, douce et brillante.",
            'using_advice' => "Appliquez en couche épaisse sur le corps. Laissez reposer pendant 15 minutes, puis rincez à l’eau tiède en effectuant des mouvements doux et circulaires.",
            'selling_price_mad' => 79,
            'starting_price_mad' => null,
            'selling_price_dollar' => 27.18,
            'starting_price_dollar' => 19.80,
            'selling_price_euro' => 24.71,
            'starting_price_euro' => 18.00,
            'image' => '/images/products/gommage-corporel-ghassoul.png',
            'category_id'=> 1,
            'user_id'=> 1
        ]);
        Product::factory()->create([
            'name' => "Gommage Corporel",
            'name_en' => 'Body Scrub',
            'description' => " Gommage exfoliant à la bave d’escargot qui favorise la régénération de la peau, aide à éliminer les cellules mortes et améliorer la structure de la peau en la rendant plus lisse et plus douce.",
            'using_advice' => " 1 à 2 fois par semaine, appliquez le gommage sur peau humide puis massez par des mouvements circulaires et rincez à l'eau claire.",
            'selling_price_mad' => 179,
            'starting_price_mad' => null,
            'selling_price_dollar' => 31.45,
            'starting_price_dollar' => 24.46,
            'selling_price_euro' => 28.59,
            'starting_price_euro' => 22.24,
            'image' => '/images/products/gommage-corporel-gommage.png',
            'category_id'=> 1,
            'user_id'=> 1
        ]);
        // categorie 3
        Product::factory()->create([
            'name' => "Crème Jour SPF 20",
            'name_en' => 'Day cream SPF 20',
            'description' => "Un soin redensifiant intensif qui protège votre peau des agressions extérieures. Enrichi de la bave d’escargot, qui nourrit, hydrate et lisse intensément la peau. Jour après jour, votre peau resplendit, son grain est affiné et le teint est éclatant.",
            'using_advice' => "Appliquez le matin sur le visage et le cou préalablement nettoyés.",
            'selling_price_mad' => 167,
            'starting_price_mad' => null,
            'selling_price_dollar' => 29.64,
            'starting_price_dollar' => 23.16,
            'selling_price_euro' => 26.94,
            'starting_price_euro' => 21.06,
            'image' => '/images/products/anti-age-creme.png',
            'category_id'=> 3,
            'user_id'=> 1
        ]);
        Product::factory()->create([
            'name' => "Sérum Overnight",
            'name_en' => 'Overnight Serum',
            'description' => "C’est le sérum idéal pour vos nuits, il apaise votre peau et facilite la régénération cellulaire, pour un réveil en beauté, une peau revitalisée et hydratée, plus saine, un teint éclatant et reposé.",
            'using_advice' => "Appliquez 3 à 4 gouttes du sérum overnight sur une peau nettoyée et sèche le soir avant d'appliquer votre soin quotidien.",
            'selling_price_mad' => 197,
            'starting_price_mad' => null,
            'selling_price_dollar' => 17.73,
            'starting_price_dollar' => 14.75,
            'selling_price_euro' => 16.12,
            'starting_price_euro' => 13.41,
            'image' => '/images/products/anti-age-serum.png',
            'category_id'=> 3,
            'user_id'=> 1
        ]);
        //
        Product::factory()->create([
            'name' => "Baume à Lèvres Éclaircissant ",
            'name_en' => 'Brightening Lip Balm',
            'description' => "Un soin quotidien réparateur, nourrissant et apaisant des lèvres gercées, desséchées et abîmées. Les lèvres sont sublimées, nourries et hydratées.",
            'using_advice' => "Appliquez le baume directement sur les lèvres aussi bien souvent que nécessaire.",
            'selling_price_mad' => 97,
            'starting_price_mad' => null,
            'selling_price_dollar' => 40.12,
            'starting_price_dollar' => 33.52,
            'selling_price_euro' => 36.47,
            'starting_price_euro' => 30.47,
            'image' => '/images/products/honey-lips-baume.png',
            'category_id'=> 4,
            'user_id'=> 1
        ]);
        Product::factory()->create([
            'name' => "Gommage à lèvres",
            'name_en' => 'Duo Lip Care',
            'description' => "Un exfoliant pour les lèvres qui les rend gourmandes à souhait. Ce soin est spécialement formulé pour la peau fragile des lèvres, il permet d’éliminer les peaux mortes, régénère et protège vos lèvres, tout en les laissant soyeuses et hydratées.",
            'using_advice' => "Appliquez le gommage sur vos lèvres. Massez doucement les lèvres en mouvements circulaires.",
            'selling_price_mad' => 107,
            'starting_price_mad' => null,
            'selling_price_dollar' => 37.40,
            'starting_price_dollar' => null,
            'selling_price_euro' => 34.00,
            'starting_price_euro' => 25.06,
            'image' => '/images/products/honey-lips-gommage.png',
            'category_id'=> 4,
            'user_id'=> 1
        ]);
    }
}
