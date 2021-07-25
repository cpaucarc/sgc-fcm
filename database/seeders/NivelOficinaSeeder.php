<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NivelOficinaSeeder extends Seeder
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
                'nombre' => 'Nivel General',
            ],
            [
                'nombre' => 'Nivel de Facultad',
            ],
            [
                'nombre' => 'Nivel de Escuela',
            ],
        ];

        \App\Models\NivelOficina::insert($niveles);
    }
}
