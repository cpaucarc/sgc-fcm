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
            ],
            [
                'nombre' => 'Tutoria y Consejeria',
            ],
            [
                'nombre' => 'Gestion de la Escuela',
            ],
            [
                'nombre' => 'Matricula',
            ],
            [
                'nombre' => 'Titulo Profesional',
            ],
            [
                'nombre' => 'Docente',
            ],
            [
                'nombre' => 'Biblioteca',
            ],
        ];

        \App\Models\Proceso::insert($procesos);
    }
}
