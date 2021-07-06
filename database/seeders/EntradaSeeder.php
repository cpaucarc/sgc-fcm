<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entradas = [
            [
                'codigo' => 'E1',
                'descripcion' => 'Informe de evaluación E-A del semestre anterior',
            ],
            [
                'codigo' => 'E2',
                'descripcion' => 'POI asignado',
            ],
            [
                'codigo' => 'E3',
                'descripcion' => 'Plan Estratégico Escuela',
            ],
            [
                'codigo' => 'E4',
                'descripcion' => 'Reglamento de la Programación, Ejecución y Control de las Actividades Académicas',
            ],
            [
                'codigo' => 'E5',
                'descripcion' => 'Modelo educativo',
            ],
            [
                'codigo' => 'E6',
                'descripcion' => 'Guía de elaboración de silabo',
            ],
            [
                'codigo' => 'E7',
                'descripcion' => 'Lista de Libros de consulta (Bibliografía)',
            ],
            [
                'codigo' => 'E8',
                'descripcion' => 'Plan de trabajo de E-A aprobado',
            ],
            [
                'codigo' => 'E9',
                'descripcion' => 'Guía de investigación formativa',
            ],
            [
                'codigo' => 'E10',
                'descripcion' => 'Esquema de sesión de aprendizaje',
            ],
            [
                'codigo' => 'E11',
                'descripcion' => 'Formato de entrega de silabo',
            ],
            [
                'codigo' => 'E12',
                'descripcion' => 'Formato de avance de silabo',
            ],
            [
                'codigo' => 'E13',
                'descripcion' => 'Formato de asistencia de estudiantes',
            ],
            [
                'codigo' => 'E14',
                'descripcion' => 'Procedimiento Tutoría',
            ],
            [
                'codigo' => 'E15',
                'descripcion' => 'Procedimiento de Supervisión al desempeño docente',
            ],
            [
                'codigo' => 'E16',
                'descripcion' => 'Formato de registro de notas',
            ],
            [
                'codigo' => 'E17',
                'descripcion' => 'Procedimiento medir',
            ],
            [
                'codigo' => 'E18',
                'descripcion' => 'Procedimiento analizar',
            ],
            [
                'codigo' => 'E19',
                'descripcion' => 'Lista de indicadores de E-A',
            ],
            [
                'codigo' => 'E20',
                'descripcion' => 'Procedimiento mejorar',
            ],
            [
                'codigo' => 'E21',
                'descripcion' => 'Formato de Plan de mejora',
            ],
            [
                'codigo' => 'E22',
                'descripcion' => 'Informe de evaluación de E-A',
            ],
            [
                'codigo' => 'E23',
                'descripcion' => 'Procedimiento Comunicar a interesados',
            ],
        ];

        \App\Models\Entrada::insert($entradas);
    }
}
