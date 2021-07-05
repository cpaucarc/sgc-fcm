<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proveedores = [
            [
                'codigo' => 'P1',
                'oficina_id' => 1,
            ],
            [
                'codigo' => 'P1',
                'oficina_id' => 2,
            ],
            [
                'codigo' => 'P2',
                'oficina_id' => 3,
            ],
            [
                'codigo' => 'P2',
                'oficina_id' => 4,
            ],
            [
                'codigo' => 'P3',
                'oficina_id' => 5,
            ],
            [
                'codigo' => 'P4',
                'oficina_id' => 6,
            ],
            [
                'codigo' => 'P5',
                'oficina_id' => 7,
            ],
            [
                'codigo' => 'P6',
                'oficina_id' => 8,
            ],
            [
                'codigo' => 'P7',
                'oficina_id' => 9,
            ],
            [
                'codigo' => 'P8',
                'oficina_id' => 10,
            ],
        ];

        \App\Models\Proveedor::insert($proveedores);
    }
}
