<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SalidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salidas = [
            [
                'codigo' => 'S1',
                'nombre' => 'Plan de trabajo de E-A aprobado',
                'actividad_id' => 1
            ],
            [
                'codigo' => 'S2',
                'nombre' => 'Silabo de la asignatura aprobado',
                'actividad_id' => 2
            ],
            [
                'codigo' => 'S3',
                'nombre' => 'Silabo publicado',
                'actividad_id' => 2
            ],
            [
                'codigo' => 'S4',
                'nombre' => 'Requerimiento de recursos',
                'actividad_id' => 3
            ],
            [
                'codigo' => 'S5',
                'nombre' => 'Plan de prácticas de la asignatura',
                'actividad_id' => 4
            ],
            [
                'codigo' => 'S6',
                'nombre' => 'Registro de entrega del sílabo a los estudiantes',
                'actividad_id' => 4
            ],
            [
                'codigo' => 'S7',
                'nombre' => 'Registro de entrega de material de clases',
                'actividad_id' => 4
            ],
            [
                'codigo' => 'S8',
                'nombre' => 'Registro de formato de avance silábico',
                'actividad_id' => 4
            ],
            [
                'codigo' => 'S9',
                'nombre' => 'Plan de responsabilidad social',
                'actividad_id' => 4
            ],
            [
                'codigo' => 'S10',
                'nombre' => 'Lista de grupos de práctica',
                'actividad_id' => 4
            ],
            [
                'codigo' => 'E11',
                'nombre' => 'Informe de Tutoría',
                'actividad_id' => 5
            ],
            [
                'codigo' => 'E12',
                'nombre' => 'Registro de notas',
                'actividad_id' => 6
            ],
            [
                'codigo' => 'S13',
                'nombre' => 'Informe de evaluación docente',
                'actividad_id' => 7
            ],
            [
                'codigo' => 'S14',
                'nombre' => 'Pre actas firmadas',
                'actividad_id' => 8
            ],
            [
                'codigo' => 'S15',
                'nombre' => 'Actas firmadas',
                'actividad_id' => 8
            ],
            [
                'codigo' => 'S16',
                'nombre' => 'Informe de situación académica del estudiante',
                'actividad_id' => 8
            ],
            [
                'codigo' => 'S17',
                'nombre' => 'Informe de evaluación de E-A',
                'actividad_id' => 9
            ],
            [
                'codigo' => 'S18',
                'nombre' => 'Resultado de los indicadores',
                'actividad_id' => 9
            ],
            [
                'codigo' => 'S19',
                'nombre' => 'Acciones y/o Plan de mejora',
                'actividad_id' => 10
            ],
            [
                'codigo' => 'S20',
                'nombre' => 'Registro y envío de comunicaciones',
                'actividad_id' => 11
            ],
        ];

        \App\Models\Salida::insert($salidas);
    }
}
