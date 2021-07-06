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
                'entidad_id' => 1,
            ],
            [
                'codigo' => 'P2',
                'entidad_id' => 2,
            ],
            [
                'codigo' => 'P3',
                'entidad_id' => 3,
            ],
            [
                'codigo' => 'P4',
                'entidad_id' => 4,
            ],
            [
                'codigo' => 'P5',
                'entidad_id' => 5,
            ],
            [
                'codigo' => 'P6',
                'entidad_id' => 6,
            ],
            [
                'codigo' => 'P7',
                'entidad_id' => 7,
            ],
            [
                'codigo' => 'P8',
                'entidad_id' => 8,
            ],
        ];

        \App\Models\Proveedor::insert($proveedores);
    }
}
