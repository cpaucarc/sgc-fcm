<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* nivel_oficina_id:
            1	Nivel General
            2	Nivel de Facultad
            3	Nivel de Escuela
        */

        $oficinas_nivel_general = [
            [
                'nivel_oficina_id' => 1,
            ],
        ];
        $oficinas_nivel_facultad = [
            [
                'nivel_oficina_id' => 2,
                'facultad_id' => 1,
            ],
        ];
        $oficinas_nivel_escuela = [
            [
                'nivel_oficina_id' => 3,
                'escuela_id' => 1,
                'facultad_id' => 1,
            ],
            [
                'nivel_oficina_id' => 3,
                'escuela_id' => 2,
                'facultad_id' => 1,
            ],
        ];

        \App\Models\Oficina::insert($oficinas_nivel_general);
        \App\Models\Oficina::insert($oficinas_nivel_facultad);
        \App\Models\Oficina::insert($oficinas_nivel_escuela);
    }
}
