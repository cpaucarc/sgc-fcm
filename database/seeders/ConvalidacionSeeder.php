<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConvalidacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $convalidacion = [
            [
                'vacantes' => '9',
                'fecha_inicio' => '2020-04-01',
                'fecha_fin' => '2020-08-01',
                'ciclo_id' => '1',
                'escuela_id' => '1',
            ],
            [
                'vacantes' => '8',
                'fecha_inicio' => '2021-08-01',
                'fecha_fin' => '2021-12-01',
                'ciclo_id' => '2',
                'escuela_id' => '1',
            ],
            [
                'vacantes' => '5',
                'fecha_inicio' => '2022-01-01',
                'fecha_fin' => '2022-04-01',
                'ciclo_id' => '3',
                'escuela_id' => '1',
            ],
            [
                'vacantes' => '6',
                'fecha_inicio' => '2020-04-01',
                'fecha_fin' => '2020-08-01',
                'ciclo_id' => '1',
                'escuela_id' => '2',
            ],
            [
                'vacantes' => '7',
                'fecha_inicio' => '2021-08-01',
                'fecha_fin' => '2021-12-01',
                'ciclo_id' => '2',
                'escuela_id' => '2',
            ],
            [
                'vacantes' => '10',
                'fecha_inicio' => '2022-01-01',
                'fecha_fin' => '2022-04-01',
                'ciclo_id' => '3',
                'escuela_id' => '2',
            ],
        ];

        \App\Models\Convalidacion::insert($convalidacion);
    }
}
