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
        $oficinas_nivel_general = [
            [
                'nivel_oficina_id' => 1,
                'entidad_id' => 3,
            ],
            [
                'nivel_oficina_id' => 1,
                'entidad_id' => 6,
            ],
            [
                'nivel_oficina_id' => 1,
                'entidad_id' => 7,
            ],
            [
                'nivel_oficina_id' => 1,
                'entidad_id' => 10,
            ],
            [
                'nivel_oficina_id' => 1,
                'entidad_id' => 11,
            ],
        ];
        $oficinas_nivel_facultad = [
            [
                'nivel_oficina_id' => 2,
                'entidad_id' => 5,
                'facultad_id' => 1,
            ],
            [
                'nivel_oficina_id' => 2,
                'entidad_id' => 8,
                'facultad_id' => 1,
            ],
            [
                'nivel_oficina_id' => 2,
                'entidad_id' => 12,
                'facultad_id' => 1,
            ],
            [
                'nivel_oficina_id' => 2,
                'entidad_id' => 13,
                'facultad_id' => 1,
            ],
        ];
        $oficinas_nivel_escuela = [
            [
                'nivel_oficina_id' => 3,
                'entidad_id' => 1,
                'escuela_id' => 1,
                'facultad_id' => 1,
            ],
            [
                'nivel_oficina_id' => 3,
                'entidad_id' => 1,
                'escuela_id' => 2,
                'facultad_id' => 1,
            ],
            [
                'nivel_oficina_id' => 3,
                'entidad_id' => 2,
                'escuela_id' => 1,
                'facultad_id' => 1,
            ],
            [
                'nivel_oficina_id' => 3,
                'entidad_id' => 2,
                'escuela_id' => 2,
                'facultad_id' => 1,
            ],
            [
                'nivel_oficina_id' => 3,
                'entidad_id' => 4,
                'escuela_id' => 1,
                'facultad_id' => 1,
            ],
            [
                'nivel_oficina_id' => 3,
                'entidad_id' => 4,
                'escuela_id' => 2,
                'facultad_id' => 1,
            ],
            [
                'nivel_oficina_id' => 3,
                'entidad_id' => 9,
                'escuela_id' => 1,
                'facultad_id' => 1,
            ],
            [
                'nivel_oficina_id' => 3,
                'entidad_id' => 9,
                'escuela_id' => 2,
                'facultad_id' => 1,
            ],
        ];

        \App\Models\Oficina::insert($oficinas_nivel_general);
        \App\Models\Oficina::insert($oficinas_nivel_facultad);
        \App\Models\Oficina::insert($oficinas_nivel_escuela);
    }
}
