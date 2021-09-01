<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GradoAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grado = [
            [
                'nombre' => 'Magister',
            ],
            [
                'nombre' => 'Doctor',
            ],
            [
                'nombre' => 'PhD',
            ],
            [
                'nombre' => 'Bachiller',
            ],
        ];

        \App\Models\GradoAcademico::insert($grado);
    }
}
