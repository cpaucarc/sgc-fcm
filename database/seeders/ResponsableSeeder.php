<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ResponsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $responsables = [
            [
                'codigo' => 'R1',
                'entidad_id' => 1,
            ],
            [
                'codigo' => 'R2',
                'entidad_id' => 2,
            ],
            [
                'codigo' => 'R3',
                'oficina_id' => 4,
            ],
        ];

        \App\Models\Responsable::insert($responsables);
    }
}
