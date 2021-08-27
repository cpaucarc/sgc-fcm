<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeclaracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $declaraciones = [
            [
                'nombre' => 'Aprobado'
            ],
            [
                'nombre' => 'Desaprobado'
            ],
        ];
        \App\Models\Declaracion::insert($declaraciones);
    }
}
