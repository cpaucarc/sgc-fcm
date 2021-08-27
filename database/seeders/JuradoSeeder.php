<?php

namespace Database\Seeders;

use App\Models\Jurado;
use Illuminate\Database\Seeder;

class JuradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurado::factory(6)->create();
    }
}
