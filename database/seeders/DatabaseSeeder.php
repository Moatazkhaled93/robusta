<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class]);
        $this->call([CitySeeder::class]);
        $this->call([BusSeeder::class]);
        $this->call([SeatSeeder::class]);
        $this->call([TripSeeder::class]);



    }
}
