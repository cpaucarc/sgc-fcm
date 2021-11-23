<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserOficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios_oficina_entidad = [
            /* User Administrador */
            [
                'user_id' => 1,
                'oficina_id' => 1,
                'entidad_id' => 14,
            ],

            /* User Docente */
            //de Enfermeria
            [
                'user_id' => 2,
                'oficina_id' => 3,
                'entidad_id' => 4,
            ],
            [
                'user_id' => 3,
                'oficina_id' => 3,
                'entidad_id' => 4,
            ],
            [
                'user_id' => 4,
                'oficina_id' => 3,
                'entidad_id' => 4,
            ],
            [
                'user_id' => 5,
                'oficina_id' => 3,
                'entidad_id' => 4,
            ],
            [
                'user_id' => 6,
                'oficina_id' => 3,
                'entidad_id' => 4,
            ],
            //de Obstetricia
            [
                'user_id' => 7,
                'oficina_id' => 4,
                'entidad_id' => 4,
            ],
            [
                'user_id' => 8,
                'oficina_id' => 4,
                'entidad_id' => 4,
            ],
            [
                'user_id' => 9,
                'oficina_id' => 4,
                'entidad_id' => 4,
            ],
            [
                'user_id' => 10,
                'oficina_id' => 4,
                'entidad_id' => 4,
            ],
            [
                'user_id' => 11,
                'oficina_id' => 4,
                'entidad_id' => 4,
            ],

            /* User Director de Escuela y Docente */
            //Director de escuela de Enfermeria
            [
                'user_id' => 12,
                'oficina_id' => 3,
                'entidad_id' => 1,
            ],
            //Director de escuela de Obtetricia y Docente de Obstetricia
            [
                'user_id' => 13,
                'oficina_id' => 4,
                'entidad_id' => 1,
            ],
            [
                'user_id' => 13,
                'oficina_id' => 4,
                'entidad_id' => 4,
            ],

            /* User Estudiante */
            //De enfermeria
            [
                'user_id' => 14,
                'oficina_id' => 3,
                'entidad_id' => 9,
            ],
            [
                'user_id' => 15,
                'oficina_id' => 3,
                'entidad_id' => 9,
            ],
            [
                'user_id' => 16,
                'oficina_id' => 3,
                'entidad_id' => 9,
            ],
            [
                'user_id' => 17,
                'oficina_id' => 3,
                'entidad_id' => 9,
            ],
            [
                'user_id' => 18,
                'oficina_id' => 3,
                'entidad_id' => 9,
            ],
            //De obstetricia
            [
                'user_id' => 19,
                'oficina_id' => 4,
                'entidad_id' => 9,
            ],
            [
                'user_id' => 20,
                'oficina_id' => 4,
                'entidad_id' => 9,
            ],
            [
                'user_id' => 21,
                'oficina_id' => 4,
                'entidad_id' => 9,
            ],
            [
                'user_id' => 22,
                'oficina_id' => 4,
                'entidad_id' => 9,
            ],
            [
                'user_id' => 23,
                'oficina_id' => 4,
                'entidad_id' => 9,
            ],

            /* User Decanatura*/
            [
                'user_id' => 24,
                'oficina_id' => 2,
                'entidad_id' => 5,
            ],
        ];

        \App\Models\UserOficina::insert($usuarios_oficina_entidad);
    }
}
