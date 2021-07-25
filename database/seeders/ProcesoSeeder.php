<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $procesos = [
            [
                'nombre' => 'Enseñanza y Aprendizaje',
                'facultad_id' => 1
            ],
            [
                'nombre' => 'Tutoria y Consejeria',
                'facultad_id' => 1
            ],
            [
                'nombre' => 'Gestion de la Escuela',
                'facultad_id' => 1
            ],
            [
                'nombre' => 'Matricula',
                'facultad_id' => 1
            ],
            [
                'nombre' => 'Titulo Profesional',
                'facultad_id' => 1
            ],
            [
                'nombre' => 'Docente',
                'facultad_id' => 1
            ],
            [
                'nombre' => 'Biblioteca',
                'facultad_id' => 1
            ],
        ];

        \App\Models\Proceso::insert($procesos);
    }
}
