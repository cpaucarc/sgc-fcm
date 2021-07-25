<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EscuelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $escuelas = [
            [
                'nombre' => 'Enfermeria',
                'facultad_id' => 1,
            ],
            [
                'nombre' => 'Obstetricia',
                'facultad_id' => 1,
            ],
        ];

        \App\Models\Escuela::insert($escuelas);
    }
}
