<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EntidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidades = [
            [
                'nombre' => 'Dirección de Escuela',
            ],
            [
                'nombre' => 'Departamento Academico',
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
                'nombre' => 'Direccion de Unidad de Calidad',
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
                'nombre' => 'Direccion de Unidad de Responsabilidad Social',
            ],
            [
                'nombre' => 'Direccion de Unidad de Investigación',
            ],
        ];

        \App\Models\Entidad::insert($entidades);
    }
}
