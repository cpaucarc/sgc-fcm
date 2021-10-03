<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('12345678');

        $users = [
            [
                'email' => 'test@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        $estudiantes = [
            [
                'email' => 'estudiante1@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 102,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante2@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 103,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante3@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 104,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante4@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 105,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante5@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 106,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante6@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 107,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante7@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 108,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante8@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 109,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante9@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 110,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante10@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 111,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante11@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 112,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante12@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 113,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante13@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 114,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante14@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 115,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'estudiante15@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 116,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        $docentes = [
            [
                'email' => 'docente1@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente2@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente3@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente4@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente5@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente6@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente7@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente8@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente9@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente10@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente11@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente12@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente13@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente14@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'email' => 'docente15@mail.com',
                'password' => $password, //Hash de 12345678
                'persona_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        \App\Models\User::insert($users); // id: 1
        \App\Models\User::insert($estudiantes); // id: 2 - 16
        \App\Models\User::insert($docentes); // id: 17 - 31
    }
}
