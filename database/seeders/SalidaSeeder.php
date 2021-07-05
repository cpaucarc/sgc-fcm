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
                'codigo' => 'E1',
                'descripcion' => 'Plan de trabajo de E-A aprobado',
            ],
            [
                'codigo' => 'E2',
                'descripcion' => 'Silabo de la asignatura aprobado',
            ],
            [
                'codigo' => 'E3',
                'descripcion' => 'Silabo publicado',
            ],
            [
                'codigo' => 'E4',
                'descripcion' => 'Requerimiento de recursos',
            ],
            [
                'codigo' => 'E5',
                'descripcion' => 'Plan de prácticas de la asignatura',
            ],
            [
                'codigo' => 'E6',
                'descripcion' => 'Registro de entrega del sílabo a los estudiantes',
            ],
            [
                'codigo' => 'E7',
                'descripcion' => 'Registro de entrega de material de clases',
            ],
            [
                'codigo' => 'E8',
                'descripcion' => 'Registro de formato de avance silábico',
            ],
            [
                'codigo' => 'E9',
                'descripcion' => 'Plan de responsabilidad social',
            ],
            [
                'codigo' => 'E10',
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
                'codigo' => 'E13',
                'descripcion' => 'Informe de evaluación docente',
            ],
            [
                'codigo' => 'E14',
                'descripcion' => 'Pre actas firmadas',
            ],
            [
                'codigo' => 'E15',
                'descripcion' => 'Actas firmadas',
            ],
            [
                'codigo' => 'E16',
                'descripcion' => 'Informe de situación académica del estudiante',
            ],
            [
                'codigo' => 'E17',
                'descripcion' => 'Informe de evaluación de E-A',
            ],
            [
                'codigo' => 'E18',
                'descripcion' => 'Resultado de los indicadores',
            ],
            [
                'codigo' => 'E19',
                'descripcion' => 'Acciones y/o Plan de mejora',
            ],
            [
                'codigo' => 'E20',
                'descripcion' => 'Registro y envío de comunicaciones',
            ],
        ];

        \App\Models\Salida::insert($salidas);
    }
}
