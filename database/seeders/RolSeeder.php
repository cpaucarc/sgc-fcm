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
        ];

        \App\Models\Rol::insert($roles);
    }
}
