<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personas = [
            [
                'dni' => '12345678',
                'nombres' => 'Frank César',
                'apellidos' => 'Paucar Colonia',
            ],
        ];

        \App\Models\Persona::insert($personas);
    }
}
