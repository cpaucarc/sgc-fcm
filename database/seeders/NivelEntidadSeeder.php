<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NivelEntidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveles = [
            [
                'nombre' => 'General',
            ],
            [
                'nombre' => 'Facultad',
            ],
            [
                'nombre' => 'Escuela',
            ],
        ];

        \App\Models\NivelEntidad::insert($niveles);
    }
}
