<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facultades = [
            [
                'nombre' => 'Facultad de Ciencias Medicas',
                'abrev' => 'FCM',
            ],
        ];

        \App\Models\Facultad::insert($facultades);
    }
}
