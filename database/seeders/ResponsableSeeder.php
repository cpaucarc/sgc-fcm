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
                'oficina_id' => 1,
            ],
            [
                'codigo' => 'R1',
                'oficina_id' => 2,
            ],
            [
                'codigo' => 'R2',
                'oficina_id' => 3,
            ],
            [
                'codigo' => 'R2',
                'oficina_id' => 4,
            ],
            [
                'codigo' => 'R3',
                'oficina_id' => 6,
            ],
        ];

        \App\Models\Responsable::insert($responsables);
    }
}
