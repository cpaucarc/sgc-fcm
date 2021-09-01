<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EstadoInvestigacionSeeder extends Seeder
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
                'nombre' => 'En ejecución',
                'color' => 'green'
            ],
            [
                'nombre' => 'Denegado',
                'color' => 'red'
            ],
            [
                'nombre' => 'Concluido',
                'color' => 'gray'
            ],
        ];

        \App\Models\EstadoInvestigacion::insert($estados);
    }
}
