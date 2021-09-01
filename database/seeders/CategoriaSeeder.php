<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'nombre' => 'Principal',
            ],
            [
                'nombre' => 'Asociado',
            ],
            [
                'nombre' => 'Auxiliar',
            ],
        ];

        \App\Models\Categoria::insert($categorias);
    }
}
