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
                'oficina_id' => 1,
            ],
            [
                'codigo' => 'C1',
                'oficina_id' => 2,
            ],
            [
                'codigo' => 'C2',
                'oficina_id' => 3,
            ],
            [
                'codigo' => 'C2',
                'oficina_id' => 4,
            ],
            [
                'codigo' => 'C3',
                'oficina_id' => 6,
            ],
            [
                'codigo' => 'C4',
                'oficina_id' => 11,
            ],
            [
                'codigo' => 'C5',
                'oficina_id' => 12,
            ],
            [
                'codigo' => 'C6',
                'oficina_id' => 13,
            ],
            [
                'codigo' => 'C7',
                'oficina_id' => 5,
            ],
            [
                'codigo' => 'C8',
                'oficina_id' => 14,
            ],
            [
                'codigo' => 'C9',
                'oficina_id' => 15,
            ],
            [
                'codigo' => 'C10',
                'oficina_id' => 8,
            ],
            [
                'codigo' => 'C11',
                'oficina_id' => 7,
            ],
        ];

        \App\Models\Cliente::insert($clientes);
    }
}
