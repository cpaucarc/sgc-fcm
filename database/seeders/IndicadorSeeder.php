<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IndicadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indicadoresRRSS = [
            [
                'objetivo' => 'Conocer el número de estudiantes que participan en proyectos de responsabilidad social.',
                'cod_ind_inicial' => 'IND-048',
                'cod_ind_final' => 'IND-048-',
                'formula' => 'X = N° de estudiantes que realizan RSU por programa',
                'minimo' => 10,
                'satisfactorio' => 20,
                'sobresaliente' => 40,
                'proceso_id' => 9,
//                'medicion_responsable_id',
//                'analisis_responsable_id',
            ],
            [
                'objetivo' => 'Conocer el número de docentes que participan en proyectos de responsabilidad social.',
                'cod_ind_inicial' => 'IND-049',
                'cod_ind_final' => 'IND-049-',
                'formula' => 'X = N° de docentes que realizan RSU por programa',
                'minimo' => 10,
                'satisfactorio' => 20,
                'sobresaliente' => 40,
                'proceso_id' => 9,
            ],
            [
                'objetivo' => 'Medir el grado de participación de los docentes en responsabilidad social',
                'cod_ind_inicial' => 'IND-050',
                'cod_ind_final' => 'IND-050-',
                'formula' => 'X = (N° de docentes que realizan RSU)/(Total de docentes por programa) x 100',
                'minimo' => 25,
                'satisfactorio' => 50,
                'sobresaliente' => 80,
                'proceso_id' => 9,
            ],
            [
                'objetivo' => 'Medir el grado de participación de los estudiantes en responsabilidad social',
                'cod_ind_inicial' => 'IND-051',
                'cod_ind_final' => 'IND-051-',
                'formula' => 'X = (N° de estudiantes que realizan RSU)/(Total de estudiantes por programa) x 100',
                'minimo' => 20,
                'satisfactorio' => 40,
                'sobresaliente' => 80,
                'proceso_id' => 9,
            ],
            [
                'objetivo' => 'Conocer el número de proyectos que realizan RSU por programa de estudios.',
                'cod_ind_inicial' => 'IND-052',
                'cod_ind_final' => 'IND-052-',
                'formula' => 'X = N° de proyectos de RSU por programa',
                'minimo' => 5,
                'satisfactorio' => 10,
                'sobresaliente' => 20,
                'proceso_id' => 9,
            ],
            [
                'objetivo' => 'Medir el porcentaje de satisfacción de los usuarios de responsabilidad social por programa de estudios',
                'cod_ind_inicial' => 'IND-053',
                'cod_ind_final' => 'IND-053-',
                'formula' => 'X = (Total satisfechos por RSU)/(Total de encuestados por RSU ) x 100',
                'minimo' => 20,
                'satisfactorio' => 40,
                'sobresaliente' => 80,
                'proceso_id' => 9,
            ],
        ];

        \App\Models\Indicador::insert($indicadoresRRSS);
    }
}
