<?php

namespace Database\Seeders;

use App\Models\Asesor;
use Illuminate\Database\Seeder;

class AsesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asesor::factory(10)->create();
    }
}
