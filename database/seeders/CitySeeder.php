<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();
        City::create([
            'id' => 1,
            'name' => 'Aïn Harrouda',
            'region' => 6
        ]);

        City::create([
            'id' => 2,
            'name' => 'Ben Yakhlef',
            'region' => 6
        ]);

        City::create([
            'id' => 3,
            'name' => 'Bouskoura',
            'region' => 6
        ]);

        City::create([
            'id' => 4,
            'name' => 'Casablanca',
            'region' => 6
        ]);

        City::create([
            'id' => 5,
            'name' => 'Médiouna',
            'region' => 6
        ]);

        City::create([
            'id' => 6,
            'name' => 'Mohammadia',
            'region' => 6
        ]);

        City::create([
            'id' => 7,
            'name' => 'Tit Mellil',
            'region' => 6
        ]);

        City::create([
            'id' => 8,
            'name' => 'Ben Yakhlef',
            'region' => 6
        ]);

        City::create([
            'id' => 9,
            'name' => 'Bejaâd',
            'region' => 5
        ]);

        City::create([
            'id' => 10,
            'name' => 'Ben Ahmed',
            'region' => 6
        ]);

        City::create([
            'id' => 11,
            'name' => 'Benslimane',
            'region' => 6
        ]);

        City::create([
            'id' => 12,
            'name' => 'Berrechid',
            'region' => 6
        ]);

        City::create([
            'id' => 13,
            'name' => 'Boujniba',
            'region' => 5
        ]);

        City::create([
            'id' => 14,
            'name' => 'Boulanouare',
            'region' => 5
        ]);

        City::create([
            'id' => 15,
            'name' => 'Bouznika',
            'region' => 6
        ]);

        City::create([
            'id' => 16,
            'name' => 'Deroua',
            'region' => 6
        ]);

        City::create([
            'id' => 17,
            'name' => 'El Borouj',
            'region' => 6
        ]);

        City::create([
            'id' => 18,
            'name' => 'El Gara',
            'region' => 6
        ]);

        City::create([
            'id' => 19,
            'name' => 'Guisser',
            'region' => 6
        ]);

        City::create([
            'id' => 20,
            'name' => 'Hattane',
            'region' => 5
        ]);

        City::create([
            'id' => 21,
            'name' => 'Khouribga',
            'region' => 5
        ]);

        City::create([
            'id' => 22,
            'name' => 'Loulad',
            'region' => 6
        ]);

        City::create([
            'id' => 23,
            'name' => 'Oued Zem',
            'region' => 5
        ]);

        City::create([
            'id' => 24,
            'name' => 'Oulad Abbou',
            'region' => 6
        ]);

        City::create([
            'id' => 25,
            'name' => 'Oulad H',
            'region' => 'Riz Sahel',
        ]);

        City::create([
            'id' => 26,
            'name' => 'Oulad M',
            'region' => 'rah',
        ]);

        City::create([
            'id' => 27,
            'name' => 'Oulad Saïd',
            'region' => 6
        ]);

        City::create([
            'id' => 28,
            'name' => 'Oulad Sidi Ben Daoud',
            'region' => 6
        ]);

        City::create([
            'id' => 29,
            'name' => 'Ras El Aïn',
            'region' => 6
        ]);

        City::create([
            'id' => 30,
            'name' => 'Settat',
            'region' => 6
        ]);

        City::create([
            'id' => 31,
            'name' => 'Sidi Rahhal Chataï',
            'region' => 6
        ]);

        City::create([
            'id' => 32,
            'name' => 'Soualem',
            'region' => 6
        ]);

        City::create([
            'id' => 33,
            'name' => 'Azemmour',
            'region' => 6
        ]);

        City::create([
            'id' => 34,
            'name' => 'Bir Jdid',
            'region' => 6
        ]);

        City::create([
            'id' => 35,
            'name' => 'Bouguedra',
            'region' => 7
        ]);

        City::create([
            'id' => 36,
            'name' => 'Echemmaia',
            'region' => 7
        ]);

        City::create([
            'id' => 37,
            'name' => 'El Jadida',
            'region' => 6
        ]);

        City::create([
            'id' => 38,
            'name' => 'Hrara',
            'region' => 7
        ]);

        City::create([
            'id' => 39,
            'name' => 'Ighoud',
            'region' => 7
        ]);

        City::create([
            'id' => 40,
            'name' => 'Jamâat Shaim',
            'region' => 7
        ]);

        City::create([
            'id' => 41,
            'name' => 'Jorf Lasfar',
            'region' => 6
        ]);

        City::create([
            'id' => 42,
            'name' => 'Khemis Zemamra',
            'region' => 6
        ]);

        City::create([
            'id' => 43,
            'name' => 'Laaounate',
            'region' => 6
        ]);

        City::create([
            'id' => 44,
            'name' => 'Moulay Abdallah',
            'region' => 6
        ]);

        City::create([
            'id' => 45,
            'name' => 'Oualidia',
            'region' => 6
        ]);

        City::create([
            'id' => 46,
            'name' => 'Oulad Amrane',
            'region' => 6
        ]);

        City::create([
            'id' => 47,
            'name' => 'Oulad Frej',
            'region' => 6
        ]);

        City::create([
            'id' => 48,
            'name' => 'Oulad Ghadbane',
            'region' => 6
        ]);

        City::create([
            'id' => 49,
            'name' => 'Safi',
            'region' => 7
        ]);

        City::create([
            'id' => 50,
            'name' => 'Sebt El Maârif',
            'region' => 6
        ]);

        City::create([
            'id' => 51,
            'name' => 'Sebt Gzoula',
            'region' => 7
        ]);

        City::create([
            'id' => 52,
            'name' => 'Sidi Ahmed',
            'region' => 7
        ]);

        City::create([
            'id' => 53,
            'name' => 'Sidi Ali Ban Hamdouche',
            'region' => 6
        ]);

        City::create([
            'id' => 54,
            'name' => 'Sidi Bennour',
            'region' => 6
        ]);

        City::create([
            'id' => 55,
            'name' => 'Sidi Bouzid',
            'region' => 6
        ]);

        City::create([
            'id' => 56,
            'name' => 'Sidi Smaïl',
            'region' => 6
        ]);

        City::create([
            'id' => 57,
            'name' => 'Youssoufia',
            'region' => 7
        ]);

        City::create([
            'id' => 58,
            'name' => 'Fès',
            'region' => 3
        ]);

        City::create([
            'id' => 59,
            'name' => 'Aïn Cheggag',
            'region' => 3
        ]);

        City::create([
            'id' => 60,
            'name' => 'Bhalil',
            'region' => 3
        ]);

        City::create([
            'id' => 61,
            'name' => 'Boulemane',
            'region' => 3
        ]);

        City::create([
            'id' => 62,
            'name' => 'El Menzel',
            'region' => 3
        ]);

        City::create([
            'id' => 63,
            'name' => 'Guigou',
            'region' => 3
        ]);

        City::create([
            'id' => 64,
            'name' => 'Imouzzer Kandar',
            'region' => 3
        ]);

        City::create([
            'id' => 65,
            'name' => 'Imouzzer Marmoucha',
            'region' => 3
        ]);

        City::create([
            'id' => 66,
            'name' => 'Missour',
            'region' => 3
        ]);

        City::create([
            'id' => 67,
            'name' => 'Moulay Yaâcoub',
            'region' => 3
        ]);

        City::create([
            'id' => 68,
            'name' => 'Ouled Tayeb',
            'region' => 3
        ]);

        City::create([
            'id' => 69,
            'name' => 'Outat El Haj',
            'region' => 3
        ]);

        City::create([
            'id' => 70,
            'name' => 'Ribate El Kheir',
            'region' => 3
        ]);

        City::create([
            'id' => 71,
            'name' => 'Séfrou',
            'region' => 3
        ]);

        City::create([
            'id' => 72,
            'name' => 'Skhinate',
            'region' => 3
        ]);

        City::create([
            'id' => 73,
            'name' => 'Tafajight',
            'region' => 3
        ]);

        City::create([
            'id' => 74,
            'name' => 'Arbaoua',
            'region' => 4
        ]);

        City::create([
            'id' => 75,
            'name' => 'Aïn Dorij',
            'region' => 1
        ]);

        City::create([
            'id' => 76,
            'name' => 'Dar Gueddari',
            'region' => 4
        ]);

        City::create([
            'id' => 77,
            'name' => 'Had Kourt',
            'region' => 4
        ]);

        City::create([
            'id' => 78,
            'name' => 'Jorf El Melha',
            'region' => 4
        ]);

        City::create([
            'id' => 79,
            'name' => 'Kénitra',
            'region' => 4
        ]);

        City::create([
            'id' => 80,
            'name' => 'Khenichet',
            'region' => 4
        ]);

        City::create([
            'id' => 81,
            'name' => 'Lalla Mimouna',
            'region' => 4
        ]);

        City::create([
            'id' => 82,
            'name' => 'Mechra Bel Ksiri',
            'region' => 4
        ]);

        City::create([
            'id' => 83,
            'name' => 'Mehdia',
            'region' => 4
        ]);

        City::create([
            'id' => 84,
            'name' => 'Moulay Bousselham',
            'region' => 4
        ]);

        City::create([
            'id' => 85,
            'name' => 'Sidi Allal Tazi',
            'region' => 4
        ]);

        City::create([
            'id' => 86,
            'name' => 'Sidi Kacem',
            'region' => 4
        ]);

        City::create([
            'id' => 87,
            'name' => 'Sidi Slimane',
            'region' => 4
        ]);

        City::create([
            'id' => 88,
            'name' => 'Sidi Taibi',
            'region' => 4
        ]);

        City::create([
            'id' => 89,
            'name' => 'Sidi Yahya El Gharb',
            'region' => 4
        ]);

        City::create([
            'id' => 90,
            'name' => 'Souk El Arbaa',
            'region' => 4
        ]);

        City::create([
            'id' => 91,
            'name' => 'Akka',
            'region' => 9
        ]);

        City::create([
            'id' => 92,
            'name' => 'Assa',
            'region' => 10
        ]);

        City::create([
            'id' => 93,
            'name' => 'Bouizakarne',
            'region' => 10
        ]);

        City::create([
            'id' => 94,
            'name' => 'El Ouatia',
            'region' => 10
        ]);

        City::create([
            'id' => 95,
            'name' => 'Es-Semara',
            'region' => 11
        ]);

        City::create([
            'id' => 96,
            'name' => 'Fam El Hisn',
            'region' => 9
        ]);

        City::create([
            'id' => 97,
            'name' => 'Foum Zguid',
            'region' => 9
        ]);

        City::create([
            'id' => 98,
            'name' => 'Guelmim',
            'region' => 10
        ]);

        City::create([
            'id' => 99,
            'name' => 'Taghjijt',
            'region' => 10
        ]);

        City::create([
            'id' => 100,
            'name' => 'Tan-Tan',
            'region' => 10
        ]);

        City::create([
            'id' => 101,
            'name' => 'Tata',
            'region' => 9
        ]);

        City::create([
            'id' => 102,
            'name' => 'Zag',
            'region' => 10
        ]);

        City::create([
            'id' => 103,
            'name' => 'Marrakech',
            'region' => 7
        ]);

        City::create([
            'id' => 104,
            'name' => 'Ait Daoud',
            'region' => 7
        ]);

        City::create([
            'id' => 115,
            'name' => 'Amizmiz',
            'region' => 7
        ]);

        City::create([
            'id' => 116,
            'name' => 'Assahrij',
            'region' => 7
        ]);

        City::create([
            'id' => 117,
            'name' => 'Aït Ourir',
            'region' => 7
        ]);

        City::create([
            'id' => 118,
            'name' => 'Ben Guerir',
            'region' => 7
        ]);

        City::create([
            'id' => 119,
            'name' => 'Chichaoua',
            'region' => 7
        ]);

        City::create([
            'id' => 120,
            'name' => 'El Hanchane',
            'region' => 7
        ]);

        City::create([
            'id' => 121,
            'name' => 'El Kelaâ des Sraghna',
            'region' => 7
        ]);

        City::create([
            'id' => 122,
            'name' => 'Essaouira',
            'region' => 7
        ]);

        City::create([
            'id' => 123,
            'name' => 'Fraïta',
            'region' => 7
        ]);

        City::create([
            'id' => 124,
            'name' => 'Ghmate',
            'region' => 7
        ]);

        City::create([
            'id' => 125,
            'name' => 'Ighounane',
            'region' => 8
        ]);

        City::create([
            'id' => 126,
            'name' => 'Imintanoute',
            'region' => 7
        ]);

        City::create([
            'id' => 127,
            'name' => 'Kattara',
            'region' => 7
        ]);

        City::create([
            'id' => 128,
            'name' => 'Lalla Takerkoust',
            'region' => 7
        ]);

        City::create([
            'id' => 129,
            'name' => 'Loudaya',
            'region' => 7
        ]);

        City::create([
            'id' => 130,
            'name' => 'Lâattaouia',
            'region' => 7
        ]);

        City::create([
            'id' => 131,
            'name' => 'Moulay Brahim',
            'region' => 7
        ]);

        City::create([
            'id' => 132,
            'name' => 'Mzouda',
            'region' => 7
        ]);

        City::create([
            'id' => 133,
            'name' => 'Ounagha',
            'region' => 7
        ]);

        City::create([
            'id' => 134,
            'name' => 'Sid L',
            'region' => 'Mokhtar',
        ]);

        City::create([
            'id' => 135,
            'name' => 'Sid Zouin',
            'region' => 7
        ]);

        City::create([
            'id' => 136,
            'name' => 'Sidi Abdallah Ghiat',
            'region' => 7
        ]);

        City::create([
            'id' => 137,
            'name' => 'Sidi Bou Othmane',
            'region' => 7
        ]);

        City::create([
            'id' => 138,
            'name' => 'Sidi Rahhal',
            'region' => 7
        ]);

        City::create([
            'id' => 139,
            'name' => 'Skhour Rehamna',
            'region' => 7
        ]);

        City::create([
            'id' => 140,
            'name' => 'Smimou',
            'region' => 7
        ]);

        City::create([
            'id' => 141,
            'name' => 'Tafetachte',
            'region' => 7
        ]);

        City::create([
            'id' => 142,
            'name' => 'Tahannaout',
            'region' => 7
        ]);

        City::create([
            'id' => 143,
            'name' => 'Talmest',
            'region' => 7
        ]);

        City::create([
            'id' => 144,
            'name' => 'Tamallalt',
            'region' => 7
        ]);

        City::create([
            'id' => 145,
            'name' => 'Tamanar',
            'region' => 7
        ]);

        City::create([
            'id' => 146,
            'name' => 'Tamansourt',
            'region' => 7
        ]);

        City::create([
            'id' => 147,
            'name' => 'Tameslouht',
            'region' => 7
        ]);

        City::create([
            'id' => 148,
            'name' => 'Tanalt',
            'region' => 9
        ]);

        City::create([
            'id' => 149,
            'name' => 'Zeubelemok',
            'region' => 7
        ]);

        City::create([
            'id' => 150,
            'name' => 'Meknès',
            'region' => 3
        ]);

        City::create([
            'id' => 151,
            'name' => 'Khénifra',
            'region' => 5
        ]);

        City::create([
            'id' => 152,
            'name' => 'Agourai',
            'region' => 3
        ]);

        City::create([
            'id' => 153,
            'name' => 'Ain Taoujdate',
            'region' => 3
        ]);

        City::create([
            'id' => 154,
            'name' => 'MyAliCherif',
            'region' => 8
        ]);

        City::create([
            'id' => 155,
            'name' => 'Rissani',
            'region' => 8
        ]);

        City::create([
            'id' => 156,
            'name' => 'Amalou Ighriben',
            'region' => 5
        ]);

        City::create([
            'id' => 157,
            'name' => 'Aoufous',
            'region' => 8
        ]);

        City::create([
            'id' => 158,
            'name' => 'Arfoud',
            'region' => 8
        ]);

        City::create([
            'id' => 159,
            'name' => 'Azrou',
            'region' => 3
        ]);

        City::create([
            'id' => 160,
            'name' => 'Aïn Jemaa',
            'region' => 3
        ]);

        City::create([
            'id' => 161,
            'name' => 'Aïn Karma',
            'region' => 3
        ]);

        City::create([
            'id' => 162,
            'name' => 'Aïn Leuh',
            'region' => 3
        ]);

        City::create([
            'id' => 163,
            'name' => 'Aït Boubidmane',
            'region' => 3
        ]);

        City::create([
            'id' => 164,
            'name' => 'Aït Ishaq',
            'region' => 5
        ]);

        City::create([
            'id' => 165,
            'name' => 'Boudnib',
            'region' => 8
        ]);

        City::create([
            'id' => 166,
            'name' => 'Boufakrane',
            'region' => 3
        ]);

        City::create([
            'id' => 167,
            'name' => 'Boumia',
            'region' => 8
        ]);

        City::create([
            'id' => 168,
            'name' => 'El Hajeb',
            'region' => 3
        ]);

        City::create([
            'id' => 169,
            'name' => 'Elkbab',
            'region' => 5
        ]);

        City::create([
            'id' => 170,
            'name' => 'Er-Rich',
            'region' => 5
        ]);

        City::create([
            'id' => 171,
            'name' => 'Errachidia',
            'region' => 8
        ]);

        City::create([
            'id' => 172,
            'name' => 'Gardmit',
            'region' => 8
        ]);

        City::create([
            'id' => 173,
            'name' => 'Goulmima',
            'region' => 8
        ]);

        City::create([
            'id' => 174,
            'name' => 'Gourrama',
            'region' => 8
        ]);

        City::create([
            'id' => 175,
            'name' => 'Had Bouhssoussen',
            'region' => 5
        ]);

        City::create([
            'id' => 176,
            'name' => 'Haj Kaddour',
            'region' => 3
        ]);

        City::create([
            'id' => 177,
            'name' => 'Ifrane',
            'region' => 3
        ]);

        City::create([
            'id' => 178,
            'name' => 'Itzer',
            'region' => 8
        ]);

        City::create([
            'id' => 179,
            'name' => 'Jorf',
            'region' => 8
        ]);

        City::create([
            'id' => 180,
            'name' => 'Kehf Nsour',
            'region' => 5
        ]);

        City::create([
            'id' => 181,
            'name' => 'Kerrouchen',
            'region' => 5
        ]);

        City::create([
            'id' => 182,
            'name' => 'M',
            'region' => 'haya',
        ]);

        City::create([
            'id' => 183,
            'name' => 'M',
            'region' => 'rirt',
        ]);

        City::create([
            'id' => 184,
            'name' => 'Midelt',
            'region' => 8
        ]);

        City::create([
            'id' => 185,
            'name' => 'Moulay Ali Cherif',
            'region' => 8
        ]);

        City::create([
            'id' => 186,
            'name' => 'Moulay Bouazza',
            'region' => 5
        ]);

        City::create([
            'id' => 187,
            'name' => 'Moulay Idriss Zerhoun',
            'region' => 3
        ]);

        City::create([
            'id' => 188,
            'name' => 'Moussaoua',
            'region' => 3
        ]);

        City::create([
            'id' => 189,
            'name' => 'N',
            'region' => 'Zalat Bni Amar',
        ]);

        City::create([
            'id' => 190,
            'name' => 'Ouaoumana',
            'region' => 5
        ]);

        City::create([
            'id' => 191,
            'name' => 'Oued Ifrane',
            'region' => 3
        ]);

        City::create([
            'id' => 192,
            'name' => 'Sabaa Aiyoun',
            'region' => 3
        ]);

        City::create([
            'id' => 193,
            'name' => 'Sebt Jahjouh',
            'region' => 3
        ]);

        City::create([
            'id' => 194,
            'name' => 'Sidi Addi',
            'region' => 3
        ]);

        City::create([
            'id' => 195,
            'name' => 'Tichoute',
            'region' => 8
        ]);

        City::create([
            'id' => 196,
            'name' => 'Tighassaline',
            'region' => 5
        ]);

        City::create([
            'id' => 197,
            'name' => 'Tighza',
            'region' => 5
        ]);

        City::create([
            'id' => 198,
            'name' => 'Timahdite',
            'region' => 3
        ]);

        City::create([
            'id' => 199,
            'name' => 'Tinejdad',
            'region' => 8
        ]);

        City::create([
            'id' => 200,
            'name' => 'Tizguite',
            'region' => 3
        ]);

        City::create([
            'id' => 201,
            'name' => 'Toulal',
            'region' => 3
        ]);

        City::create([
            'id' => 202,
            'name' => 'Tounfite',
            'region' => 8
        ]);

        City::create([
            'id' => 203,
            'name' => 'Zaouia d',
            'region' => 'Ifrane',
        ]);

        City::create([
            'id' => 204,
            'name' => 'Zaïda',
            'region' => 8
        ]);

        City::create([
            'id' => 205,
            'name' => 'Ahfir',
            'region' => 2
        ]);

        City::create([
            'id' => 206,
            'name' => 'Aklim',
            'region' => 2
        ]);

        City::create([
            'id' => 207,
            'name' => 'Al Aroui',
            'region' => 2
        ]);

        City::create([
            'id' => 208,
            'name' => 'Aïn Bni Mathar',
            'region' => 2
        ]);

        City::create([
            'id' => 209,
            'name' => 'Aïn Erreggada',
            'region' => 2
        ]);

        City::create([
            'id' => 210,
            'name' => 'Ben Taïeb',
            'region' => 2
        ]);

        City::create([
            'id' => 211,
            'name' => 'Berkane',
            'region' => 2
        ]);

        City::create([
            'id' => 212,
            'name' => 'Bni Ansar',
            'region' => 2
        ]);

        City::create([
            'id' => 213,
            'name' => 'Bni Chiker',
            'region' => 2
        ]);

        City::create([
            'id' => 214,
            'name' => 'Bni Drar',
            'region' => 2
        ]);

        City::create([
            'id' => 215,
            'name' => 'Bni Tadjite',
            'region' => 2
        ]);

        City::create([
            'id' => 216,
            'name' => 'Bouanane',
            'region' => 2
        ]);

        City::create([
            'id' => 217,
            'name' => 'Bouarfa',
            'region' => 2
        ]);

        City::create([
            'id' => 218,
            'name' => 'Bouhdila',
            'region' => 2
        ]);

        City::create([
            'id' => 219,
            'name' => 'Dar El Kebdani',
            'region' => 2
        ]);

        City::create([
            'id' => 220,
            'name' => 'Debdou',
            'region' => 2
        ]);

        City::create([
            'id' => 221,
            'name' => 'Douar Kannine',
            'region' => 2
        ]);

        City::create([
            'id' => 222,
            'name' => 'Driouch',
            'region' => 2
        ]);

        City::create([
            'id' => 223,
            'name' => 'El Aïoun Sidi Mellouk',
            'region' => 2
        ]);

        City::create([
            'id' => 224,
            'name' => 'Farkhana',
            'region' => 2
        ]);

        City::create([
            'id' => 225,
            'name' => 'Figuig',
            'region' => 2
        ]);

        City::create([
            'id' => 226,
            'name' => 'Ihddaden',
            'region' => 2
        ]);

        City::create([
            'id' => 227,
            'name' => 'Jaâdar',
            'region' => 2
        ]);

        City::create([
            'id' => 228,
            'name' => 'Jerada',
            'region' => 2
        ]);

        City::create([
            'id' => 229,
            'name' => 'Kariat Arekmane',
            'region' => 2
        ]);

        City::create([
            'id' => 230,
            'name' => 'Kassita',
            'region' => 2
        ]);

        City::create([
            'id' => 231,
            'name' => 'Kerouna',
            'region' => 2
        ]);

        City::create([
            'id' => 232,
            'name' => 'Laâtamna',
            'region' => 2
        ]);

        City::create([
            'id' => 233,
            'name' => 'Madagh',
            'region' => 2
        ]);

        City::create([
            'id' => 234,
            'name' => 'Midar',
            'region' => 2
        ]);

        City::create([
            'id' => 235,
            'name' => 'Nador',
            'region' => 2
        ]);

        City::create([
            'id' => 236,
            'name' => 'Naima',
            'region' => 2
        ]);

        City::create([
            'id' => 237,
            'name' => 'Oued Heimer',
            'region' => 2
        ]);

        City::create([
            'id' => 238,
            'name' => 'Oujda',
            'region' => 2
        ]);

        City::create([
            'id' => 239,
            'name' => 'Ras El Ma',
            'region' => 2
        ]);

        City::create([
            'id' => 240,
            'name' => 'Saïdia',
            'region' => 2
        ]);

        City::create([
            'id' => 241,
            'name' => 'Selouane',
            'region' => 2
        ]);

        City::create([
            'id' => 242,
            'name' => 'Sidi Boubker',
            'region' => 2
        ]);

        City::create([
            'id' => 243,
            'name' => 'Sidi Slimane Echcharaa',
            'region' => 2
        ]);

        City::create([
            'id' => 244,
            'name' => 'Talsint',
            'region' => 2
        ]);

        City::create([
            'id' => 245,
            'name' => 'Taourirt',
            'region' => 2
        ]);

        City::create([
            'id' => 246,
            'name' => 'Tendrara',
            'region' => 2
        ]);

        City::create([
            'id' => 247,
            'name' => 'Tiztoutine',
            'region' => 2
        ]);

        City::create([
            'id' => 248,
            'name' => 'Touima',
            'region' => 2
        ]);

        City::create([
            'id' => 249,
            'name' => 'Touissit',
            'region' => 2
        ]);

        City::create([
            'id' => 250,
            'name' => 'Zaïo',
            'region' => 2
        ]);

        City::create([
            'id' => 251,
            'name' => 'Zeghanghane',
            'region' => 2
        ]);

        City::create([
            'id' => 252,
            'name' => 'Rabat',
            'region' => 4
        ]);

        City::create([
            'id' => 253,
            'name' => 'Salé',
            'region' => 4
        ]);

        City::create([
            'id' => 254,
            'name' => 'Ain El Aouda',
            'region' => 4
        ]);

        City::create([
            'id' => 255,
            'name' => 'Harhoura',
            'region' => 4
        ]);

        City::create([
            'id' => 256,
            'name' => 'Khémisset',
            'region' => 4
        ]);

        City::create([
            'id' => 257,
            'name' => 'Oulmès',
            'region' => 4
        ]);

        City::create([
            'id' => 258,
            'name' => 'Rommani',
            'region' => 4
        ]);

        City::create([
            'id' => 259,
            'name' => 'Sidi Allal El Bahraoui',
            'region' => 4
        ]);

        City::create([
            'id' => 260,
            'name' => 'Sidi Bouknadel',
            'region' => 4
        ]);

        City::create([
            'id' => 261,
            'name' => 'Skhirate',
            'region' => 4
        ]);

        City::create([
            'id' => 262,
            'name' => 'Tamesna',
            'region' => 4
        ]);

        City::create([
            'id' => 263,
            'name' => 'Témara',
            'region' => 4
        ]);

        City::create([
            'id' => 264,
            'name' => 'Tiddas',
            'region' => 4
        ]);

        City::create([
            'id' => 265,
            'name' => 'Tiflet',
            'region' => 4
        ]);

        City::create([
            'id' => 266,
            'name' => 'Touarga',
            'region' => 4
        ]);

        City::create([
            'id' => 267,
            'name' => 'Agadir',
            'region' => 9
        ]);

        City::create([
            'id' => 268,
            'name' => 'Agdz',
            'region' => 8
        ]);

        City::create([
            'id' => 269,
            'name' => 'Agni Izimmer',
            'region' => 9
        ]);

        City::create([
            'id' => 270,
            'name' => 'Aït Melloul',
            'region' => 9
        ]);

        City::create([
            'id' => 271,
            'name' => 'Alnif',
            'region' => 8
        ]);

        City::create([
            'id' => 272,
            'name' => 'Anzi',
            'region' => 9
        ]);

        City::create([
            'id' => 273,
            'name' => 'Aoulouz',
            'region' => 9
        ]);

        City::create([
            'id' => 274,
            'name' => 'Aourir',
            'region' => 9
        ]);

        City::create([
            'id' => 275,
            'name' => 'Arazane',
            'region' => 9
        ]);

        City::create([
            'id' => 276,
            'name' => 'Aït Baha',
            'region' => 9
        ]);

        City::create([
            'id' => 277,
            'name' => 'Aït Iaâza',
            'region' => 9
        ]);

        City::create([
            'id' => 278,
            'name' => 'Aït Yalla',
            'region' => 8
        ]);

        City::create([
            'id' => 279,
            'name' => 'Ben Sergao',
            'region' => 9
        ]);

        City::create([
            'id' => 280,
            'name' => 'Biougra',
            'region' => 9
        ]);

        City::create([
            'id' => 281,
            'name' => 'Boumalne-Dadès',
            'region' => 8
        ]);

        City::create([
            'id' => 282,
            'name' => 'Dcheira El Jihadia',
            'region' => 9
        ]);

        City::create([
            'id' => 283,
            'name' => 'Drargua',
            'region' => 9
        ]);

        City::create([
            'id' => 284,
            'name' => 'El Guerdane',
            'region' => 9
        ]);

        City::create([
            'id' => 285,
            'name' => 'Harte Lyamine',
            'region' => 8
        ]);

        City::create([
            'id' => 286,
            'name' => 'Ida Ougnidif',
            'region' => 9
        ]);

        City::create([
            'id' => 287,
            'name' => 'Ifri',
            'region' => 8
        ]);

        City::create([
            'id' => 288,
            'name' => 'Igdamen',
            'region' => 9
        ]);

        City::create([
            'id' => 289,
            'name' => 'Ighil n',
            'region' => 'Oumgoun',
        ]);

        City::create([
            'id' => 290,
            'name' => 'Imassine',
            'region' => 8
        ]);

        City::create([
            'id' => 291,
            'name' => 'Inezgane',
            'region' => 9
        ]);

        City::create([
            'id' => 292,
            'name' => 'Irherm',
            'region' => 9
        ]);

        City::create([
            'id' => 293,
            'name' => 'Kelaat-M',
            'region' => 'Gouna',
        ]);

        City::create([
            'id' => 294,
            'name' => 'Lakhsas',
            'region' => 9
        ]);

        City::create([
            'id' => 295,
            'name' => 'Lakhsass',
            'region' => 9
        ]);

        City::create([
            'id' => 296,
            'name' => 'Lqliâa',
            'region' => 9
        ]);

        City::create([
            'id' => 297,
            'name' => 'M',
            'region' => 'semrir',
        ]);

        City::create([
            'id' => 298,
            'name' => 'Massa (Maroc)',
            'region' => 9
        ]);

        City::create([
            'id' => 299,
            'name' => 'Megousse',
            'region' => 9
        ]);

        City::create([
            'id' => 300,
            'name' => 'Ouarzazate',
            'region' => 8
        ]);

        City::create([
            'id' => 301,
            'name' => 'Oulad Berhil',
            'region' => 9
        ]);

        City::create([
            'id' => 302,
            'name' => 'Oulad Teïma',
            'region' => 9
        ]);

        City::create([
            'id' => 303,
            'name' => 'Sarghine',
            'region' => 8
        ]);

        City::create([
            'id' => 304,
            'name' => 'Sidi Ifni',
            'region' => 10
        ]);

        City::create([
            'id' => 305,
            'name' => 'Skoura',
            'region' => 8
        ]);

        City::create([
            'id' => 306,
            'name' => 'Tabounte',
            'region' => 8
        ]);

        City::create([
            'id' => 307,
            'name' => 'Tafraout',
            'region' => 9
        ]);

        City::create([
            'id' => 308,
            'name' => 'Taghzout',
            'region' => 1
        ]);

        City::create([
            'id' => 309,
            'name' => 'Tagzen',
            'region' => 9
        ]);

        City::create([
            'id' => 310,
            'name' => 'Taliouine',
            'region' => 9
        ]);

        City::create([
            'id' => 311,
            'name' => 'Tamegroute',
            'region' => 8
        ]);

        City::create([
            'id' => 312,
            'name' => 'Tamraght',
            'region' => 9
        ]);

        City::create([
            'id' => 313,
            'name' => 'Tanoumrite Nkob Zagora',
            'region' => 8
        ]);

        City::create([
            'id' => 314,
            'name' => 'Taourirt ait zaghar',
            'region' => 8
        ]);

        City::create([
            'id' => 315,
            'name' => 'Taroudannt',
            'region' => 9
        ]);

        City::create([
            'id' => 316,
            'name' => 'Temsia',
            'region' => 9
        ]);

        City::create([
            'id' => 317,
            'name' => 'Tifnit',
            'region' => 9
        ]);

        City::create([
            'id' => 318,
            'name' => 'Tisgdal',
            'region' => 9
        ]);

        City::create([
            'id' => 319,
            'name' => 'Tiznit',
            'region' => 9
        ]);

        City::create([
            'id' => 320,
            'name' => 'Toundoute',
            'region' => 8
        ]);

        City::create([
            'id' => 321,
            'name' => 'Zagora',
            'region' => 8
        ]);

        City::create([
            'id' => 322,
            'name' => 'Afourar',
            'region' => 5
        ]);

        City::create([
            'id' => 323,
            'name' => 'Aghbala',
            'region' => 5
        ]);

        City::create([
            'id' => 324,
            'name' => 'Azilal',
            'region' => 5
        ]);

        City::create([
            'id' => 325,
            'name' => 'Aït Majden',
            'region' => 5
        ]);

        City::create([
            'id' => 326,
            'name' => 'Beni Ayat',
            'region' => 5
        ]);

        City::create([
            'id' => 327,
            'name' => 'Béni Mellal',
            'region' => 5
        ]);

        City::create([
            'id' => 328,
            'name' => 'Bin elouidane',
            'region' => 5
        ]);

        City::create([
            'id' => 329,
            'name' => 'Bradia',
            'region' => 5
        ]);

        City::create([
            'id' => 330,
            'name' => 'Bzou',
            'region' => 5
        ]);

        City::create([
            'id' => 331,
            'name' => 'Dar Oulad Zidouh',
            'region' => 5
        ]);

        City::create([
            'id' => 332,
            'name' => 'Demnate',
            'region' => 5
        ]);

        City::create([
            'id' => 333,
            'name' => 'Dra',
            'region' => 'a',
        ]);

        City::create([
            'id' => 334,
            'name' => 'El Ksiba',
            'region' => 5
        ]);

        City::create([
            'id' => 335,
            'name' => 'Foum Jamaa',
            'region' => 5
        ]);

        City::create([
            'id' => 336,
            'name' => 'Fquih Ben Salah',
            'region' => 5
        ]);

        City::create([
            'id' => 337,
            'name' => 'Kasba Tadla',
            'region' => 5
        ]);

        City::create([
            'id' => 338,
            'name' => 'Ouaouizeght',
            'region' => 5
        ]);

        City::create([
            'id' => 339,
            'name' => 'Oulad Ayad',
            'region' => 5
        ]);

        City::create([
            'id' => 340,
            'name' => 'Oulad M',
            'region' => 'Barek',
        ]);

        City::create([
            'id' => 341,
            'name' => 'Oulad Yaich',
            'region' => 5
        ]);

        City::create([
            'id' => 342,
            'name' => 'Sidi Jaber',
            'region' => 5
        ]);

        City::create([
            'id' => 343,
            'name' => 'Souk Sebt Oulad Nemma',
            'region' => 5
        ]);

        City::create([
            'id' => 344,
            'name' => 'Zaouïat Cheikh',
            'region' => 5
        ]);

        City::create([
            'id' => 345,
            'name' => 'Tanger',
            'region' => 1
        ]);

        City::create([
            'id' => 346,
            'name' => 'Tétouan',
            'region' => 1
        ]);

        City::create([
            'id' => 347,
            'name' => 'Akchour',
            'region' => 1
        ]);

        City::create([
            'id' => 348,
            'name' => 'Assilah',
            'region' => 1
        ]);

        City::create([
            'id' => 349,
            'name' => 'Bab Berred',
            'region' => 1
        ]);

        City::create([
            'id' => 350,
            'name' => 'Bab Taza',
            'region' => 1
        ]);

        City::create([
            'id' => 351,
            'name' => 'Brikcha',
            'region' => 1
        ]);

        City::create([
            'id' => 352,
            'name' => 'Chefchaouen',
            'region' => 1
        ]);

        City::create([
            'id' => 353,
            'name' => 'Dar Bni Karrich',
            'region' => 1
        ]);

        City::create([
            'id' => 354,
            'name' => 'Dar Chaoui',
            'region' => 1
        ]);

        City::create([
            'id' => 355,
            'name' => 'Fnideq',
            'region' => 1
        ]);

        City::create([
            'id' => 356,
            'name' => 'Gueznaia',
            'region' => 1
        ]);

        City::create([
            'id' => 357,
            'name' => 'Jebha',
            'region' => 1
        ]);

        City::create([
            'id' => 358,
            'name' => 'Karia',
            'region' => 3
        ]);

        City::create([
            'id' => 359,
            'name' => 'Khémis Sahel',
            'region' => 1
        ]);

        City::create([
            'id' => 360,
            'name' => 'Ksar El Kébir',
            'region' => 1
        ]);

        City::create([
            'id' => 361,
            'name' => 'Larache',
            'region' => 1
        ]);

        City::create([
            'id' => 362,
            'name' => 'M',
            'region' => 'diq',
        ]);

        City::create([
            'id' => 363,
            'name' => 'Martil',
            'region' => 1
        ]);

        City::create([
            'id' => 364,
            'name' => 'Moqrisset',
            'region' => 1
        ]);

        City::create([
            'id' => 365,
            'name' => 'Oued Laou',
            'region' => 1
        ]);

        City::create([
            'id' => 366,
            'name' => 'Oued Rmel',
            'region' => 1
        ]);

        City::create([
            'id' => 367,
            'name' => 'Ouazzane',
            'region' => 1
        ]);

        City::create([
            'id' => 368,
            'name' => 'Point Cires',
            'region' => 1
        ]);

        City::create([
            'id' => 369,
            'name' => 'Sidi Lyamani',
            'region' => 1
        ]);

        City::create([
            'id' => 370,
            'name' => 'Sidi Mohamed ben Abdallah el-Raisuni',
            'region' => 1
        ]);

        City::create([
            'id' => 371,
            'name' => 'Zinat',
            'region' => 1
        ]);

        City::create([
            'id' => 372,
            'name' => 'Ajdir',
            'region' => 1
        ]);

        City::create([
            'id' => 373,
            'name' => 'Aknoul',
            'region' => 3
        ]);

        City::create([
            'id' => 374,
            'name' => 'Al Hoceïma',
            'region' => 1
        ]);

        City::create([
            'id' => 375,
            'name' => 'Aït Hichem',
            'region' => 1
        ]);

        City::create([
            'id' => 376,
            'name' => 'Bni Bouayach',
            'region' => 1
        ]);

        City::create([
            'id' => 377,
            'name' => 'Bni Hadifa',
            'region' => 1
        ]);

        City::create([
            'id' => 378,
            'name' => 'Ghafsai',
            'region' => 3
        ]);

        City::create([
            'id' => 379,
            'name' => 'Guercif',
            'region' => 2
        ]);

        City::create([
            'id' => 380,
            'name' => 'Imzouren',
            'region' => 1
        ]);

        City::create([
            'id' => 381,
            'name' => 'Inahnahen',
            'region' => 1
        ]);

        City::create([
            'id' => 382,
            'name' => 'Issaguen (Ketama)',
            'region' => 1
        ]);

        City::create([
            'id' => 383,
            'name' => 'Karia (El Jadida)',
            'region' => 6
        ]);

        City::create([
            'id' => 384,
            'name' => 'Karia Ba Mohamed',
            'region' => 3
        ]);

        City::create([
            'id' => 385,
            'name' => 'Oued Amlil',
            'region' => 3
        ]);

        City::create([
            'id' => 386,
            'name' => 'Oulad Zbair',
            'region' => 3
        ]);

        City::create([
            'id' => 387,
            'name' => 'Tahla',
            'region' => 3
        ]);

        City::create([
            'id' => 388,
            'name' => 'Tala Tazegwaght',
            'region' => 1
        ]);

        City::create([
            'id' => 389,
            'name' => 'Tamassint',
            'region' => 1
        ]);

        City::create([
            'id' => 390,
            'name' => 'Taounate',
            'region' => 3
        ]);

        City::create([
            'id' => 391,
            'name' => 'Targuist',
            'region' => 1
        ]);

        City::create([
            'id' => 392,
            'name' => 'Taza',
            'region' => 3
        ]);

        City::create([
            'id' => 393,
            'name' => 'Taïnaste',
            'region' => 3
        ]);

        City::create([
            'id' => 394,
            'name' => 'Thar Es-Souk',
            'region' => 3
        ]);

        City::create([
            'id' => 395,
            'name' => 'Tissa',
            'region' => 3
        ]);

        City::create([
            'id' => 396,
            'name' => 'Tizi Ouasli',
            'region' => 3
        ]);

        City::create([
            'id' => 397,
            'name' => 'Laayoune',
            'region' => 11
        ]);

        City::create([
            'id' => 398,
            'name' => 'El Marsa',
            'region' => 11
        ]);

        City::create([
            'id' => 399,
            'name' => 'Tarfaya',
            'region' => 11
        ]);

        City::create([
            'id' => 400,
            'name' => 'Boujdour',
            'region' => 11
        ]);

        City::create([
            'id' => 401,
            'name' => 'Awsard',
            'region' => 12
        ]);

        City::create([
            'id' => 402,
            'name' => 'Oued-Eddahab',
            'region' => 12
        ]);

        City::create([
            'id' => 403,
            'name' => 'Stehat',
            'region' => 1
        ]);

        City::create([
            'id' => 404,
            'name' => 'Aït Attab',
            'region' => 5
        ]);
    }
}
