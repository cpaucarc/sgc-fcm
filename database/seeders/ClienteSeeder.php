<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [
            [
                'codigo' => 'C1',
                'entidad_id' => 1,
            ],
            [
                'codigo' => 'C2',
                'entidad_id' => 2,
            ],
            [
                'codigo' => 'C3',
                'entidad_id' => 4
            ],
            [
                'codigo' => 'C4',
                'entidad_id' => 9,
            ],
            [
                'codigo' => 'C5',
                'entidad_id' => 10,
            ],
            [
                'codigo' => 'C6',
                'entidad_id' => 11,
            ],
            [
                'codigo' => 'C7',
                'entidad_id' => 3,
            ],
            [
                'codigo' => 'C8',
                'entidad_id' => 12,
            ],
            [
                'codigo' => 'C9',
                'entidad_id' => 13,
            ],
            [
                'codigo' => 'C10',
                'entidad_id' => 6,
            ],
            [
                'codigo' => 'C11',
                'entidad_id' => 5,
            ],
        ];

        \App\Models\Cliente::insert($clientes);
    }
}
