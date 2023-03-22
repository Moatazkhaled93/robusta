<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ['Cairo', 'Giza', 'AlFayyum', 'AlMinya', 'Asyut'];
        foreach($cities as $city){
            City::create(['name'=>$city]);
        }

    }
}
