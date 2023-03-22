<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bus;
class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bus::factory()->count(5)->create();
    }
}
