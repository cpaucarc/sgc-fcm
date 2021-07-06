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
        $oficinas = [
            [
                'nombre' => 'Dirección de Escuela de Enfermeria',
            ],
            [
                'nombre' => 'Dirección de Escuela de Obstetricia',
            ],
            [
                'nombre' => 'Director de Departamento de Enfermeria',
            ],
            [
                'nombre' => 'Director de Departamento de Obstetricia',
            ],
            [
                'nombre' => 'Oficina General de Estudios',
            ],
            [
                'nombre' => 'Docente',
            ],
            [
                'nombre' => 'Decanatura',
            ],
            [
                'nombre' => 'Directora de Unidad de Calidad',
            ],
            [
                'nombre' => 'Biblioteca',
            ],
            [
                'nombre' => 'Comite de Tutoria',
            ],
            [
                'nombre' => 'Estudiante',
            ],
            [
                'nombre' => 'Vicerrectorado Académico',
            ],
            [
                'nombre' => 'Vicerrectorado de Investigación',
            ],
            [
                'nombre' => 'Director de Unidad de RS',
            ],
            [
                'nombre' => 'Director de Unidad de Investigación',
            ],
        ];

        \App\Models\Oficina::insert($oficinas);
    }
}
