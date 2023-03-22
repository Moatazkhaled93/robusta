<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i<13;$i++){
            Seat::create(['seat_id'=> 'A'.$i,'bus_id'=>1,'available'=>1]);
        }
    }
}
