<?php

use Illuminate\Database\Seeder;

use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new Country;
        $country->name = "España";
        $country->save();
    }
}
