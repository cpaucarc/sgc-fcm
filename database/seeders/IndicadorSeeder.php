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
        $indicadoresRRSS_Facultad = [
            //IND-048
            [
                'objetivo' => 'Conocer el número de estudiantes que participan en proyectos de responsabilidad social.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° estudiantes que realizan RSU',
                'cod_ind_inicial' => 'IND-048',
                'cod_ind_final' => 'IND-048-',
                'formula' => 'X = N° de estudiantes que realizan RSU por programa',
                'minimo' => 10,
                'satisfactorio' => 20,
                'sobresaliente' => 40,
                'proceso_id' => 9,
                'unidad_medida_id' => 1,
                'frecuencia_id' => 2,
                'facultad_id' => 1
            ],
            //IND-049
            [
                'objetivo' => 'Conocer el número de docentes que participan en proyectos de responsabilidad social.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° docentes que realizan RSU',
                'cod_ind_inicial' => 'IND-049',
                'cod_ind_final' => 'IND-049-',
                'formula' => 'X = N° de docentes que realizan RSU por programa',
                'minimo' => 10,
                'satisfactorio' => 20,
                'sobresaliente' => 40,
                'proceso_id' => 9,
                'unidad_medida_id' => 1,
                'frecuencia_id' => 2,
                'facultad_id' => 1
            ],
            //IND-050
            [
                'objetivo' => 'Medir el grado de participación de los docentes en responsabilidad social',
                'titulo_interes' => 'N° docentes en RSU',
                'titulo_total' => 'N° total de docentes',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-050',
                'cod_ind_final' => 'IND-050-',
                'formula' => 'X = (N° de docentes que realizan RSU)/(Total de docentes por programa) x 100',
                'minimo' => 25,
                'satisfactorio' => 50,
                'sobresaliente' => 80,
                'proceso_id' => 9,
                'unidad_medida_id' => 2,
                'frecuencia_id' => 2,
                'facultad_id' => 1
            ],
            //IND-051
            [
                'objetivo' => 'Medir el grado de participación de los estudiantes en responsabilidad social',
                'titulo_interes' => 'N° estudiantes en RSU',
                'titulo_total' => 'N° total de estudiantes',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-051',
                'cod_ind_final' => 'IND-051-',
                'formula' => 'X = (N° de estudiantes que realizan RSU)/(Total de estudiantes por programa) x 100',
                'minimo' => 20,
                'satisfactorio' => 40,
                'sobresaliente' => 80,
                'proceso_id' => 9,
                'unidad_medida_id' => 2,
                'frecuencia_id' => 2,
                'facultad_id' => 1
            ],
            //IND-052
            [
                'objetivo' => 'Conocer el número de proyectos que realizan RSU por programa de estudios.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° proyectos de RSU',
                'cod_ind_inicial' => 'IND-052',
                'cod_ind_final' => 'IND-052-',
                'formula' => 'X = N° de proyectos de RSU por programa',
                'minimo' => 5,
                'satisfactorio' => 10,
                'sobresaliente' => 20,
                'proceso_id' => 9,
                'unidad_medida_id' => 1,
                'frecuencia_id' => 2,
                'facultad_id' => 1
            ],
            //IND-053
            [
                'objetivo' => 'Medir el porcentaje de satisfacción de los usuarios de responsabilidad social por programa de estudios',
                'titulo_interes' => 'N° usuarios satisfechos',
                'titulo_total' => 'N° de encuestados',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-053',
                'cod_ind_final' => 'IND-053-',
                'formula' => 'X = (Total satisfechos por RSU)/(Total de encuestados por RSU ) x 100',
                'minimo' => 20,
                'satisfactorio' => 40,
                'sobresaliente' => 80,
                'proceso_id' => 9,
                'unidad_medida_id' => 2,
                'frecuencia_id' => 2,
                'facultad_id' => 1
            ],
        ];
        $indicadoresRRSS_Escuela = [
            //IND-048
            [
                'objetivo' => 'Conocer el número de estudiantes que participan en proyectos de responsabilidad social.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° estudiantes que realizan RSU',
                'cod_ind_inicial' => 'IND-048',
                'cod_ind_final' => 'IND-048-RES-ENF',
                'formula' => 'X = N° de estudiantes que realizan RSU por programa',
                'minimo' => 10,
                'satisfactorio' => 20,
                'sobresaliente' => 40,
                'proceso_id' => 9,
                'unidad_medida_id' => 1,
                'frecuencia_id' => 2,
                'facultad_id' => 1,
                'escuela_id' => 1
            ],
            [
                'objetivo' => 'Conocer el número de estudiantes que participan en proyectos de responsabilidad social.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° estudiantes que realizan RSU',
                'cod_ind_inicial' => 'IND-048',
                'cod_ind_final' => 'IND-048-RES-OBS',
                'formula' => 'X = N° de estudiantes que realizan RSU por programa',
                'minimo' => 10,
                'satisfactorio' => 20,
                'sobresaliente' => 40,
                'proceso_id' => 9,
                'unidad_medida_id' => 1,
                'frecuencia_id' => 2,
                'facultad_id' => 1,
                'escuela_id' => 2
            ],
            //IND-049
            [
                'objetivo' => 'Conocer el número de docentes que participan en proyectos de responsabilidad social.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° docentes que realizan RSU',
                'cod_ind_inicial' => 'IND-049',
                'cod_ind_final' => 'IND-049-RES-ENF',
                'formula' => 'X = N° de docentes que realizan RSU por programa',
                'minimo' => 10,
                'satisfactorio' => 20,
                'sobresaliente' => 40,
                'proceso_id' => 9,
                'unidad_medida_id' => 1,
                'frecuencia_id' => 2,
                'facultad_id' => 1,
                'escuela_id' => 1
            ],
            [
                'objetivo' => 'Conocer el número de docentes que participan en proyectos de responsabilidad social.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° docentes que realizan RSU',
                'cod_ind_inicial' => 'IND-049',
                'cod_ind_final' => 'IND-049-RES-OBS',
                'formula' => 'X = N° de docentes que realizan RSU por programa',
                'minimo' => 10,
                'satisfactorio' => 20,
                'sobresaliente' => 40,
                'proceso_id' => 9,
                'unidad_medida_id' => 1,
                'frecuencia_id' => 2,
                'facultad_id' => 1,
                'escuela_id' => 2
            ],
            //IND-050
            [
                'objetivo' => 'Medir el grado de participación de los docentes en responsabilidad social',
                'titulo_interes' => 'N° docentes en RSU',
                'titulo_total' => 'N° total de docentes',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-050',
                'cod_ind_final' => 'IND-050-RES-ENF',
                'formula' => 'X = (N° de docentes que realizan RSU)/(Total de docentes por programa) x 100',
                'minimo' => 25,
                'satisfactorio' => 50,
                'sobresaliente' => 80,
                'proceso_id' => 9,
                'unidad_medida_id' => 2,
                'frecuencia_id' => 2,
                'facultad_id' => 1,
                'escuela_id' => 1
            ],
            [
                'objetivo' => 'Medir el grado de participación de los docentes en responsabilidad social',
                'titulo_interes' => 'N° docentes en RSU',
                'titulo_total' => 'N° total de docentes',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-050',
                'cod_ind_final' => 'IND-050-RES-OBS',
                'formula' => 'X = (N° de docentes que realizan RSU)/(Total de docentes por programa) x 100',
                'minimo' => 25,
                'satisfactorio' => 50,
                'sobresaliente' => 80,
                'proceso_id' => 9,
                'unidad_medida_id' => 2,
                'frecuencia_id' => 2,
                'facultad_id' => 1,
                'escuela_id' => 2
            ],
            //IND-051
            [
                'objetivo' => 'Medir el grado de participación de los estudiantes en responsabilidad social',
                'titulo_interes' => 'N° estudiantes en RSU',
                'titulo_total' => 'N° total de estudiantes',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-051',
                'cod_ind_final' => 'IND-051-RES-ENF',
                'formula' => 'X = (N° de estudiantes que realizan RSU)/(Total de estudiantes por programa) x 100',
                'minimo' => 20,
                'satisfactorio' => 40,
                'sobresaliente' => 80,
                'proceso_id' => 9,
                'unidad_medida_id' => 2,
                'frecuencia_id' => 2,
                'facultad_id' => 1,
                'escuela_id' => 1
            ],
            [
                'objetivo' => 'Medir el grado de participación de los estudiantes en responsabilidad social',
                'titulo_interes' => 'N° estudiantes en RSU',
                'titulo_total' => 'N° total de estudiantes',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-051',
                'cod_ind_final' => 'IND-051-RES-OBS',
                'formula' => 'X = (N° de estudiantes que realizan RSU)/(Total de estudiantes por programa) x 100',
                'minimo' => 20,
                'satisfactorio' => 40,
                'sobresaliente' => 80,
                'proceso_id' => 9,
                'unidad_medida_id' => 2,
                'frecuencia_id' => 2,
                'facultad_id' => 1,
                'escuela_id' => 2
            ],
            //IND-052
            [
                'objetivo' => 'Conocer el número de proyectos que realizan RSU por programa de estudios.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° proyectos de RSU',
                'cod_ind_inicial' => 'IND-052',
                'cod_ind_final' => 'IND-052-RES-ENF',
                'formula' => 'X = N° de proyectos de RSU por programa',
                'minimo' => 5,
                'satisfactorio' => 10,
                'sobresaliente' => 20,
                'proceso_id' => 9,
                'unidad_medida_id' => 1,
                'frecuencia_id' => 2,
                'facultad_id' => 1,
                'escuela_id' => 1
            ],
            [
                'objetivo' => 'Conocer el número de proyectos que realizan RSU por programa de estudios.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° proyectos de RSU',
                'cod_ind_inicial' => 'IND-052',
                'cod_ind_final' => 'IND-052-RES-OBS',
                'formula' => 'X = N° de proyectos de RSU por programa',
                'minimo' => 5,
                'satisfactorio' => 10,
                'sobresaliente' => 20,
                'proceso_id' => 9,
                'unidad_medida_id' => 1,
                'frecuencia_id' => 2,
                'facultad_id' => 1,
                'escuela_id' => 2
            ],
            //IND-053
            [
                'objetivo' => 'Medir el porcentaje de satisfacción de los usuarios de responsabilidad social por programa de estudios',
                'titulo_interes' => 'N° usuarios satisfechos',
                'titulo_total' => 'N° de encuestados',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-053',
                'cod_ind_final' => 'IND-053-RES-ENF',
                'formula' => 'X = (Total satisfechos por RSU)/(Total de encuestados por RSU ) x 100',
                'minimo' => 20,
                'satisfactorio' => 40,
                'sobresaliente' => 80,
                'proceso_id' => 9,
                'unidad_medida_id' => 2,
                'frecuencia_id' => 2,
                'facultad_id' => 1,
                'escuela_id' => 1
            ],
            [
                'objetivo' => 'Medir el porcentaje de satisfacción de los usuarios de responsabilidad social por programa de estudios',
                'titulo_interes' => 'N° usuarios satisfechos',
                'titulo_total' => 'N° de encuestados',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-053',
                'cod_ind_final' => 'IND-053-RES-OBS',
                'formula' => 'X = (Total satisfechos por RSU)/(Total de encuestados por RSU ) x 100',
                'minimo' => 20,
                'satisfactorio' => 40,
                'sobresaliente' => 80,
                'proceso_id' => 9,
                'unidad_medida_id' => 2,
                'frecuencia_id' => 2,
                'facultad_id' => 1,
                'escuela_id' => 2
            ],
        ];

        \App\Models\Indicador::insert($indicadoresRRSS_Facultad);
        \App\Models\Indicador::insert($indicadoresRRSS_Escuela);
    }
}
