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
                'descripcion' => 'Plan de trabajo de E-A aprobado',
            ],
            [
                'codigo' => 'S2',
                'descripcion' => 'Silabo de la asignatura aprobado',
            ],
            [
                'codigo' => 'S3',
                'descripcion' => 'Silabo publicado',
            ],
            [
                'codigo' => 'S4',
                'descripcion' => 'Requerimiento de recursos',
            ],
            [
                'codigo' => 'S5',
                'descripcion' => 'Plan de prácticas de la asignatura',
            ],
            [
                'codigo' => 'S6',
                'descripcion' => 'Registro de entrega del sílabo a los estudiantes',
            ],
            [
                'codigo' => 'S7',
                'descripcion' => 'Registro de entrega de material de clases',
            ],
            [
                'codigo' => 'S8',
                'descripcion' => 'Registro de formato de avance silábico',
            ],
            [
                'codigo' => 'S9',
                'descripcion' => 'Plan de responsabilidad social',
            ],
            [
                'codigo' => 'S10',
                'descripcion' => 'Lista de grupos de práctica',
            ],
            [
                'codigo' => 'E11',
                'descripcion' => 'Informe de Tutoría',
            ],
            [
                'codigo' => 'E12',
                'descripcion' => 'Registro de notas',
            ],
            [
                'codigo' => 'S13',
                'descripcion' => 'Informe de evaluación docente',
            ],
            [
                'codigo' => 'S14',
                'descripcion' => 'Pre actas firmadas',
            ],
            [
                'codigo' => 'S15',
                'descripcion' => 'Actas firmadas',
            ],
            [
                'codigo' => 'S16',
                'descripcion' => 'Informe de situación académica del estudiante',
            ],
            [
                'codigo' => 'S17',
                'descripcion' => 'Informe de evaluación de E-A',
            ],
            [
                'codigo' => 'S18',
                'descripcion' => 'Resultado de los indicadores',
            ],
            [
                'codigo' => 'S19',
                'descripcion' => 'Acciones y/o Plan de mejora',
            ],
            [
                'codigo' => 'S20',
                'descripcion' => 'Registro y envío de comunicaciones',
            ],
        ];

        \App\Models\Salida::insert($salidas);
    }
}
