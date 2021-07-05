<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EntradaProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrada_proveedor = [
            [
                'proveedor_id' => 1,
                'actividad_id' => 1,
                'entrada_id' => 1,
            ],
            [
                'proveedor_id' => 1,
                'actividad_id' => 1,
                'entrada_id' => 3,
            ],
            [
                'proveedor_id' => 1,
                'actividad_id' => 1,
                'entrada_id' => 4,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 1,
                'entrada_id' => 1,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 1,
                'entrada_id' => 3,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 1,
                'entrada_id' => 4,
            ],
            [
                'proveedor_id' => 7,
                'actividad_id' => 1,
                'entrada_id' => 2,
            ],
            [
                'proveedor_id' => 5,
                'actividad_id' => 2,
                'entrada_id' => 4,
            ],
            [
                'proveedor_id' => 1,
                'actividad_id' => 2,
                'entrada_id' => 5,
            ],
            [
                'proveedor_id' => 1,
                'actividad_id' => 2,
                'entrada_id' => 6,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 2,
                'entrada_id' => 5,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 2,
                'entrada_id' => 6,
            ],
            [
                'proveedor_id' => 9,
                'actividad_id' => 2,
                'entrada_id' => 7,
            ],
            [
                'proveedor_id' => 7,
                'actividad_id' => 3,
                'entrada_id' => 2,
            ],
            [
                'proveedor_id' => 1,
                'actividad_id' => 3,
                'entrada_id' => 3,
            ],
            [
                'proveedor_id' => 1,
                'actividad_id' => 3,
                'entrada_id' => 8,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 3,
                'entrada_id' => 3,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 3,
                'entrada_id' => 8,
            ],
            [
                'proveedor_id' => 5,
                'actividad_id' => 4,
                'entrada_id' => 4,
            ],
            [
                'proveedor_id' => 1,
                'actividad_id' => 4,
                'entrada_id' => 9,
            ],
            [
                'proveedor_id' => 1,
                'actividad_id' => 4,
                'entrada_id' => 11,
            ],
            [
                'proveedor_id' => 1,
                'actividad_id' => 4,
                'entrada_id' => 12,
            ],
            [
                'proveedor_id' => 1,
                'actividad_id' => 4,
                'entrada_id' => 13,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 4,
                'entrada_id' => 9,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 4,
                'entrada_id' => 11,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 4,
                'entrada_id' => 12,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 4,
                'entrada_id' => 13,
            ],
            [
                'proveedor_id' => 10,
                'actividad_id' => 5,
                'entrada_id' => 14,
            ],
            [
                'proveedor_id' => 5,
                'actividad_id' => 6,
                'entrada_id' => 16,
            ],
            [
                'proveedor_id' => 3,
                'actividad_id' => 7,
                'entrada_id' => 15,
            ],
            [
                'proveedor_id' => 4,
                'actividad_id' => 7,
                'entrada_id' => 15,
            ],
            [
                'proveedor_id' => 5,
                'actividad_id' => 8,
                'entrada_id' => 16,
            ],
            [
                'proveedor_id' => 8,
                'actividad_id' => 9,
                'entrada_id' => 17,
            ],
            [
                'proveedor_id' => 8,
                'actividad_id' => 9,
                'entrada_id' => 18,
            ],
            [
                'proveedor_id' => 1,
                'actividad_id' => 9,
                'entrada_id' => 19,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 9,
                'entrada_id' => 19,
            ],
            [
                'proveedor_id' => 8,
                'actividad_id' => 10,
                'entrada_id' => 20,
            ],
            [
                'proveedor_id' => 8,
                'actividad_id' => 10,
                'entrada_id' => 21,
            ],
            [
                'proveedor_id' => 1,
                'actividad_id' => 10,
                'entrada_id' => 22,
            ],
            [
                'proveedor_id' => 2,
                'actividad_id' => 10,
                'entrada_id' => 22,
            ],
            [
                'proveedor_id' => 7,
                'actividad_id' => 11,
                'entrada_id' => 23,
            ],
        ];

        \App\Models\EntradaProveedor::insert($entrada_proveedor);
    }
}
