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
                'nombre' => 'En evaluacion',
                'color' => 'indigo'
            ],
            [
                'nombre' => 'Rechazado',
                'color' => 'red'
            ],
            [
                'nombre' => 'Aceptado',
                'color' => 'green'
            ],
        ];

        \App\Models\EstadoSolicitud::insert($estados);
    }
}
