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
                'nivel_entidad_id' => 3,
            ],
            [
                'nombre' => 'Departamento Academico',
                'nivel_entidad_id' => 3,
            ],
            [
                'nombre' => 'Oficina General de Estudios',
                'nivel_entidad_id' => 1,
            ],
            [
                'nombre' => 'Docente',
                'nivel_entidad_id' => 3,
            ],
            [
                'nombre' => 'Decanatura',
                'nivel_entidad_id' => 2,
            ],
            [
                'nombre' => 'Direccion de Unidad de Calidad',
                'nivel_entidad_id' => 1,
            ],
            [
                'nombre' => 'Biblioteca',
                'nivel_entidad_id' => 1,
            ],
            [
                'nombre' => 'Comite de Tutoria',
                'nivel_entidad_id' => 2,
            ],
            [
                'nombre' => 'Estudiante',
                'nivel_entidad_id' => 3,
            ],
            [
                'nombre' => 'Vicerrectorado Académico',
                'nivel_entidad_id' => 1,
            ],
            [
                'nombre' => 'Vicerrectorado de Investigación',
                'nivel_entidad_id' => 1,
            ],
            [
                'nombre' => 'Direccion de Unidad de Responsabilidad Social',
                'nivel_entidad_id' => 2,
            ],
            [
                'nombre' => 'Direccion de Unidad de Investigación',
                'nivel_entidad_id' => 2,
            ],
        ];

        \App\Models\Entidad::insert($entidades);
    }
}
