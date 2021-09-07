<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EstadoEstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            [
                'nombre' => 'Activo',
                'color' => 'green'
            ],
            [
                'nombre' => 'Inactivo',
                'color' => 'red'
            ],
            [
                'nombre' => 'Egresado',
                'color' => 'gray'
            ],
            [
                'nombre' => 'Bachiller',
                'color' => 'gray'
            ],
            [
                'nombre' => 'Titulado',
                'color' => 'indigo'
            ],
        ];

        \App\Models\EstadoEstudiante::insert($estados);
    }
}
