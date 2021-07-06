<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NivelOficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveles = [
            [
                'nombre' => 'General',
            ],
            [
                'nombre' => 'Facultad',
            ],
            [
                'nombre' => 'Escuela',
            ],
        ];

        \App\Models\NivelOficina::insert($niveles);
    }
}
