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
        // Responsabilidad Social
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

        // Investigacion
        $indicadoresInvEscuela = [
            //IND-044
            [
                'objetivo' => 'Medir el grado de participación de los docentes en los proyectos de investigación.',
                'titulo_interes' => 'N° Docentes en PI',
                'titulo_total' => 'N° Docentes',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-044',
                'cod_ind_final' => 'IND-044-INV-ENF',
                'formula' => 'X = (N° de docentes que participan en PI)/(Total de docentes del programa) x 100',
                'minimo' => 20,
                'satisfactorio' => 30,
                'sobresaliente' => 50,
                'proceso_id' => 8, //DB: procesos: 8:Investigacion
                'unidad_medida_id' => 2, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 1 // 1:Enfermeria | 2:Obstetricia
            ],
            [
                'objetivo' => 'Medir el grado de participación de los docentes en los proyectos de investigación.',
                'titulo_interes' => 'N° Docentes en PI',
                'titulo_total' => 'N° Docentes',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-044',
                'cod_ind_final' => 'IND-044-INV-OBS',
                'formula' => 'X = (N° de docentes que participan en PI)/(Total de docentes del programa) x 100',
                'minimo' => 20,
                'satisfactorio' => 30,
                'sobresaliente' => 50,
                'proceso_id' => 8, //DB: procesos: 8:Investigacion
                'unidad_medida_id' => 2, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 2 // 1:Enfermeria | 2:Obstetricia
            ],
            //IND-045
            [
                'objetivo' => 'Medir el grado de participación de los estudiantes en los proyectos de investigación.',
                'titulo_interes' => 'N° estudiantes en PI',
                'titulo_total' => 'N° estudiantes',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-045',
                'cod_ind_final' => 'IND-045-INV-ENF',
                'formula' => 'X = (N° de estudiantes que participan en PI)/(Total de estudiantes del programa) x 100',
                'minimo' => 0.5,
                'satisfactorio' => 1,
                'sobresaliente' => 2,
                'proceso_id' => 8, //DB: procesos: 8:Investigacion
                'unidad_medida_id' => 2, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 1 // 1:Enfermeria | 2:Obstetricia
            ],
            [
                'objetivo' => 'Medir el grado de participación de los estudiantes en los proyectos de investigación.',
                'titulo_interes' => 'N° estudiantes en PI',
                'titulo_total' => 'N° estudiantes',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-045',
                'cod_ind_final' => 'IND-045-INV-OBS',
                'formula' => 'X = (N° de estudiantes que participan en PI)/(Total de estudiantes del programa) x 100',
                'minimo' => 0.5,
                'satisfactorio' => 1,
                'sobresaliente' => 2,
                'proceso_id' => 8, //DB: procesos: 8:Investigacion
                'unidad_medida_id' => 2, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 2 // 1:Enfermeria | 2:Obstetricia
            ],
            //IND-046
            [
                'objetivo' => 'Saber el número de trabajos de investigación publicados por programa de estudios.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'Número trabajos de investigación publicados',
                'cod_ind_inicial' => 'IND-046',
                'cod_ind_final' => 'IND-046-INV-ENF',
                'formula' => 'X = N° de trabajos de investigación publicados por programa de estudios',
                'minimo' => 2,
                'satisfactorio' => 4,
                'sobresaliente' => 6,
                'proceso_id' => 8, //DB: procesos: 8:Investigacion
                'unidad_medida_id' => 1, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 1 // 1:Enfermeria | 2:Obstetricia
            ],
            [
                'objetivo' => 'Saber el número de trabajos de investigación publicados por programa de estudios.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'Número trabajos de investigación publicados',
                'cod_ind_inicial' => 'IND-046',
                'cod_ind_final' => 'IND-046-INV-OBS',
                'formula' => 'X = N° de trabajos de investigación publicados por programa de estudios',
                'minimo' => 2,
                'satisfactorio' => 4,
                'sobresaliente' => 6,
                'proceso_id' => 8, //DB: procesos: 8:Investigacion
                'unidad_medida_id' => 1, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 2 // 1:Enfermeria | 2:Obstetricia
            ],
            //IND-047
            [
                'objetivo' => 'Conocer el número de Proyectos de investigacion presentados por programa de estudios.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° de proyectos de investigación',
                'cod_ind_inicial' => 'IND-047',
                'cod_ind_final' => 'IND-047-INV-ENF',
                'formula' => 'X = N° de Proyectos de invetigacion presentados por programa',
                'minimo' => 2,
                'satisfactorio' => 4,
                'sobresaliente' => 6,
                'proceso_id' => 8, //DB: procesos: 8:Investigacion
                'unidad_medida_id' => 1, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 1 // 1:Enfermeria | 2:Obstetricia
            ],
            [
                'objetivo' => 'Conocer el número de Proyectos de investigacion presentados por programa de estudios.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° de proyectos de investigación',
                'cod_ind_inicial' => 'IND-047',
                'cod_ind_final' => 'IND-047-INV-OBS',
                'formula' => 'X = N° de Proyectos de invetigacion presentados por programa',
                'minimo' => 2,
                'satisfactorio' => 4,
                'sobresaliente' => 6,
                'proceso_id' => 8, //DB: procesos: 8:Investigacion
                'unidad_medida_id' => 1, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 2 // 1:Enfermeria | 2:Obstetricia
            ],

        ];

        // Grado Bachiller
        $indicadoresBachEscuela = [
            //IND-058
            [
                'objetivo' => 'Medir el porcentaje de egresados que obtienen el grado de bachiller.',
                'titulo_interes' => 'N° de Bachilleres',
                'titulo_total' => 'N° de egresados',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-058',
                'cod_ind_final' => 'IND-058-GRA-ENF',
                'formula' => 'X = (N° de bachilleres)/(Total de egresados del programa) x 100',
                'minimo' => 60,
                'satisfactorio' => 80,
                'sobresaliente' => 90,
                'proceso_id' => 12, //DB: procesos: 12: Bachiller
                'unidad_medida_id' => 2, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 1 // 1:Enfermeria | 2:Obstetricia
            ],
            [
                'objetivo' => 'Medir el porcentaje de egresados que obtienen el grado de bachiller.',
                'titulo_interes' => 'N° de Bachilleres',
                'titulo_total' => 'N° de egresados',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-058',
                'cod_ind_final' => 'IND-058-GRA-OBS',
                'formula' => 'X = (N° de bachilleres)/(Total de egresados del programa) x 100',
                'minimo' => 60,
                'satisfactorio' => 80,
                'sobresaliente' => 90,
                'proceso_id' => 12, //DB: procesos: 12: Bachiller
                'unidad_medida_id' => 2, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 2 // 1:Enfermeria | 2:Obstetricia
            ],
        ];

        // Titulo profesional
        $indicadoresTitProfesional = [
            //IND-059
            [
                'objetivo' => 'Medir el porcentaje de titulados por programa de estudios.',
                'titulo_interes' => 'N° de titulados',
                'titulo_total' => 'N° de bachilleres',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-059',
                'cod_ind_final' => 'IND-059-TIT-ENF',
                'formula' => 'X = (N° de egresados que logran titularse)/(Total de graduados en bachiller por  programa) x 100',
                'minimo' => 70,
                'satisfactorio' => 80,
                'sobresaliente' => 98,
                'proceso_id' => 5, //DB: procesos: 5: Titulo Profesional
                'unidad_medida_id' => 2, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 1 // 1:Enfermeria | 2:Obstetricia
            ],
            [
                'objetivo' => 'Medir el porcentaje de titulados por programa de estudios.',
                'titulo_interes' => 'N° de titulados',
                'titulo_total' => 'N° de bachilleres',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-059',
                'cod_ind_final' => 'IND-059-TIT-ENF',
                'formula' => 'X = (N° de egresados que logran titularse)/(Total de graduados en bachiller por  programa) x 100',
                'minimo' => 70,
                'satisfactorio' => 80,
                'sobresaliente' => 98,
                'proceso_id' => 5, //DB: procesos: 5: Titulo Profesional
                'unidad_medida_id' => 2, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 2 // 1:Enfermeria | 2:Obstetricia
            ],
            //IND-060
            [
                'objetivo' => 'Conocer la cantidad de titulados por programa de estudios.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° de titulados',
                'cod_ind_inicial' => 'IND-060',
                'cod_ind_final' => 'IIND-060-TIT-ENF',
                'formula' => 'X = N° de titulados por programa de estudios',
                'minimo' => 30,
                'satisfactorio' => 40,
                'sobresaliente' => 95,
                'proceso_id' => 5, //DB: procesos: 5: Titulo Profesional
                'unidad_medida_id' => 1, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 1 // 1:Enfermeria | 2:Obstetricia
            ],
            [
                'objetivo' => 'Conocer la cantidad de titulados por programa de estudios.',
                'titulo_interes' => null,
                'titulo_total' => null,
                'titulo_resultado' => 'N° de titulados',
                'cod_ind_inicial' => 'IND-060',
                'cod_ind_final' => 'IIND-060-TIT-ENF',
                'formula' => 'X = N° de titulados por programa de estudios',
                'minimo' => 30,
                'satisfactorio' => 40,
                'sobresaliente' => 95,
                'proceso_id' => 5, //DB: procesos: 5: Titulo Profesional
                'unidad_medida_id' => 1, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 2 // 1:Enfermeria | 2:Obstetricia
            ],
            //IND-061
            [
                'objetivo' => 'Medir el porcentaje de proyectos de investigación aprobados por programa de estudios.',
                'titulo_interes' => 'N° de proyectos de investigación aprobados',
                'titulo_total' => 'N° de proyectos de investigación presentados',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-061',
                'cod_ind_final' => 'IND-061-TIT-ENF',
                'formula' => 'X = (N° de proyectos de investigación aprobados)/(Total de PI presentados por  programa) x 100',
                'minimo' => 30,
                'satisfactorio' => 50,
                'sobresaliente' => 90,
                'proceso_id' => 5, //DB: procesos: 5: Titulo Profesional
                'unidad_medida_id' => 2, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 1 // 1:Enfermeria | 2:Obstetricia
            ],
            [
                'objetivo' => 'Medir el porcentaje de proyectos de investigación aprobados por programa de estudios.',
                'titulo_interes' => 'N° de proyectos de investigación aprobados',
                'titulo_total' => 'N° de proyectos de investigación presentados',
                'titulo_resultado' => 'Resultado Indicador',
                'cod_ind_inicial' => 'IND-061',
                'cod_ind_final' => 'IND-061-TIT-ENF',
                'formula' => 'X = (N° de proyectos de investigación aprobados)/(Total de PI presentados por  programa) x 100',
                'minimo' => 30,
                'satisfactorio' => 50,
                'sobresaliente' => 90,
                'proceso_id' => 5, //DB: procesos: 5: Titulo Profesional
                'unidad_medida_id' => 2, //1: Numero | 2:Porcentaje
                'frecuencia_id' => 2, //1:Mensual | 2:Semestral
                'facultad_id' => 1,
                'escuela_id' => 2 // 1:Enfermeria | 2:Obstetricia
            ],
        ];


        \App\Models\Indicador::insert($indicadoresRRSS_Facultad);
        \App\Models\Indicador::insert($indicadoresRRSS_Escuela);
        \App\Models\Indicador::insert($indicadoresInvEscuela);
        \App\Models\Indicador::insert($indicadoresBachEscuela);
        \App\Models\Indicador::insert($indicadoresTitProfesional);
    }
}
