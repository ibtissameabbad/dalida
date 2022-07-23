<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\User;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Truncate before seed
        */
//        Eloquent::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//        Country::truncate();
        User::truncate();
        City::truncate();
        Campaign::truncate();
        $this->call([
//            CountriesSeederTable::class,
            UserTableSeeder::class,
            CategorySeeder::class,
            CitySeeder::class,
            ProductSeeder::class,
            SlideSeeder::class,
            SettingSeeder::class
        ]);
    }
}
