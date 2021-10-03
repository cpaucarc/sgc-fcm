<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            // administrador
            [
                'user_id' => '1',
                'oficina_id' => '3',
                'entidad_id' => '1',
            ],
            [
                'user_id' => '1',
                'oficina_id' => '3',
                'entidad_id' => '4',
            ],
            //estudiantes
            [
                'user_id' => '2',
                'oficina_id' => '3',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '3',
                'oficina_id' => '4',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '4',
                'oficina_id' => '3',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '5',
                'oficina_id' => '4',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '6',
                'oficina_id' => '3',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '7',
                'oficina_id' => '4',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '8',
                'oficina_id' => '3',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '9',
                'oficina_id' => '3',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '10',
                'oficina_id' => '4',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '11',
                'oficina_id' => '3',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '12',
                'oficina_id' => '4',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '13',
                'oficina_id' => '3',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '14',
                'oficina_id' => '4',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '15',
                'oficina_id' => '3',
                'entidad_id' => '9',
            ],
            [
                'user_id' => '16',
                'oficina_id' => '4',
                'entidad_id' => '9',
            ],
            //docentes
            [
                'user_id' => '17',
                'oficina_id' => '3',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '18',
                'oficina_id' => '4',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '19',
                'oficina_id' => '3',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '20',
                'oficina_id' => '4',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '21',
                'oficina_id' => '3',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '22',
                'oficina_id' => '4',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '23',
                'oficina_id' => '3',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '24',
                'oficina_id' => '3',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '25',
                'oficina_id' => '4',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '26',
                'oficina_id' => '3',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '27',
                'oficina_id' => '3',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '28',
                'oficina_id' => '4',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '29',
                'oficina_id' => '3',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '30',
                'oficina_id' => '3',
                'entidad_id' => '4',
            ],
            [
                'user_id' => '31',
                'oficina_id' => '4',
                'entidad_id' => '4',
            ],
        ];

        \App\Models\Rol::insert($roles);
    }
}
