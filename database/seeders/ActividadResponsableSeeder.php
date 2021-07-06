<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ActividadResponsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actividad_responsable = [
            [
                'responsable_id' => 1,
                'actividad_id' => 1,
            ],
            [
                'responsable_id' => 2,
                'actividad_id' => 1,
            ],
            [
                'responsable_id' => 5,
                'actividad_id' => 2,
            ],
            [
                'responsable_id' => 1,
                'actividad_id' => 3,
            ],
            [
                'responsable_id' => 2,
                'actividad_id' => 3,
            ],
            [
                'responsable_id' => 5,
                'actividad_id' => 4,
            ],
            [
                'responsable_id' => 5,
                'actividad_id' => 5,
            ],
            [
                'responsable_id' => 5,
                'actividad_id' => 6,
            ],
            [
                'responsable_id' => 1,
                'actividad_id' => 7,
            ],
            [
                'responsable_id' => 2,
                'actividad_id' => 7,
            ],
            [
                'responsable_id' => 3,
                'actividad_id' => 7,
            ],
            [
                'responsable_id' => 4,
                'actividad_id' => 7,
            ],
            [
                'responsable_id' => 1,
                'actividad_id' => 8,
            ],
            [
                'responsable_id' => 2,
                'actividad_id' => 8,
            ],
            [
                'responsable_id' => 5,
                'actividad_id' => 8,
            ],
            [
                'responsable_id' => 1,
                'actividad_id' => 9,
            ],
            [
                'responsable_id' => 2,
                'actividad_id' => 9,
            ],
            [
                'responsable_id' => 1,
                'actividad_id' => 10,
            ],
            [
                'responsable_id' => 2,
                'actividad_id' => 10,
            ],
            [
                'responsable_id' => 1,
                'actividad_id' => 11,
            ],
            [
                'responsable_id' => 2,
                'actividad_id' => 11,
            ],
        ];

        \App\Models\ActividadResponsable::insert($actividad_responsable);
    }
}
