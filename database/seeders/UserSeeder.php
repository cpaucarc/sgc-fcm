<?php

namespace Database\Seeders;

use App\Models\User;
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

        /* User Administrador Persona:1 */
        User::create([
            'email' => 'test@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Administrador');

        /* User Docente Persona: 2-11 */
        User::create([
            'email' => 'docente1@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Docente');
        User::create([
            'email' => 'docente2@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Docente');
        User::create([
            'email' => 'docente3@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Docente');
        User::create([
            'email' => 'docente4@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Docente');
        User::create([
            'email' => 'docente5@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 6,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Docente');
        User::create([
            'email' => 'docente6@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 7,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Docente');
        User::create([
            'email' => 'docente7@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Docente');
        User::create([
            'email' => 'docente8@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 9,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Docente');
        User::create([
            'email' => 'docente9@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Docente');
        User::create([
            'email' => 'docente10@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 11,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Docente');

        /* User Director de Escuela y Docente Persona:12-13 */
        User::create([
            'email' => 'director1@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 12,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Dirección de Escuela');
        User::create([
            'email' => 'director2@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 13,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole(['Dirección de Escuela', 'Docente']);

        /* User Estudiante Persona: 102-111 */
        User::create([
            'email' => 'estudiante1@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 102,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Estudiante');
        User::create([
            'email' => 'estudiante2@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 103,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Estudiante');
        User::create([
            'email' => 'estudiante3@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 104,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Estudiante');
        User::create([
            'email' => 'estudiante4@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 105,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Estudiante');
        User::create([
            'email' => 'estudiante5@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 106,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Estudiante');
        User::create([
            'email' => 'estudiante6@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 107,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Estudiante');
        User::create([
            'email' => 'estudiante7@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 108,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Estudiante');
        User::create([
            'email' => 'estudiante8@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 109,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Estudiante');
        User::create([
            'email' => 'estudiante9@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 110,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Estudiante');
        User::create([
            'email' => 'estudiante10@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 111,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Estudiante');

        /* User Decanatura Persona: 112 */
        User::create([
            'email' => 'decano1@mail.com',
            'password' => $password, //Hash de 12345678
            'persona_id' => 112,
            'created_at' => now(),
            'updated_at' => now()
        ])->assignRole('Decanatura');

    }
}
