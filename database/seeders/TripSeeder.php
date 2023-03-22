<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trip::create(['name'=>'Cairo To Asyut' ,'data_time'=>now(),'bus_id'=> 1,'from'=>'1','to'=>'5','route'=>[1,3,4,5]]);
    }
}
