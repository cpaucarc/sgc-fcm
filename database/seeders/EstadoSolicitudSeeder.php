<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EstadoSolicitudSeeder extends Seeder
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
                'nombre' => 'En Evaluacion',
                'color' => 'indigo'
            ],
            [
                'nombre' => 'Denegado',
                'color' => 'red'
            ],
            [
                'nombre' => 'Aprobado',
                'color' => 'green'
            ],
        ];

        \App\Models\EstadoSolicitud::insert($estados);
    }
}
