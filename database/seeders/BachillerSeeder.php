<?php

namespace Database\Seeders;

use App\Models\Bachiller;
use Illuminate\Database\Seeder;

class BachillerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bachiller::factory(50)->create();
    }
}
