<?php

namespace Database\Factories;

use App\Models\GradoEstudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradoEstudianteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GradoEstudiante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estudiante_id' => rand(1, 100),
            'grado_academico_id' => rand(2, 4),
        ];
    }
}
