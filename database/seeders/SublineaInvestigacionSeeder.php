<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SublineaInvestigacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lineas = [
            [
                'nombre' => 'CUIDADOS DE ENFERMERÍA EN SALUD FAMILIAR Y MENTAL',
                'linea_id' => 1
            ],
            [
                'nombre' => 'CUIDADOS DE ENFERMERÍA DE LAS AFECCIONES TRANSMISIBLES Y NO TRANSMISIBLES',
                'linea_id' => 1
            ],
            [
                'nombre' => 'GESTIÓN Y DESEMPEÑO DE ENFERMERÍA',
                'linea_id' => 1
            ],
            [
                'nombre' => 'ESTUDIO DEL BINOMIO MADRE - NIÑO EN SUS DIVERSOS ASPECTOS',
                'linea_id' => 1
            ],
            [
                'nombre' => 'SALUD SEXUAL, REPRODUCTIVA, Y EMERGENCIAS OBSTÉTRICAS',
                'linea_id' => 1
            ],
            [
                'nombre' => 'ESTUDIO DE LA MEDICINA TRADICIONAL ALTERNATIVA Y COMPLEMENTARIA, Y DE SALUD FAMILIAR Y COMUNITARIA',
                'linea_id' => 1
            ],
            [
                'nombre' => 'SALUD PÚBLICA, Y SISTEMAS DE SERVICIO DE SALUD',
                'linea_id' => 1
            ],
        ];

        \App\Models\SublineaInvestigacion::insert($lineas);
    }
}
