<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FrecuenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frecuencias = [
            [
                'nombre' => 'Mensual',
            ],
            [
                'nombre' => 'Semestral',
            ],
        ];

        \App\Models\Frecuencia::insert($frecuencias);
    }
}
