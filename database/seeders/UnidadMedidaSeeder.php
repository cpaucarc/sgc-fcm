<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidades = [
            [
                'nombre' => 'Numero',
            ],
            [
                'nombre' => 'Porcentaje',
            ],
        ];

        \App\Models\UnidadMedida::insert($unidades);
    }
}
