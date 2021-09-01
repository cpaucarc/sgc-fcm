<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AreaInvestigacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                'nombre' => 'Ciencias Médicas y de la Salud',
            ],
            [
                'nombre' => 'Ciencias Agrícolas',
            ],
        ];

        \App\Models\AreaInvestigacion::insert($areas);
    }
}
