<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'test@mail.com',
                'password' => '$2y$10$LejhhA9bwdK8ShPMnvf3sO1Q3x2ehwR7hvf1JTKh.nNY/UvuIhcam', //Hash de 12345678
                'persona_id' => '1',
            ],
        ];

        \App\Models\User::insert($users);
    }
}
