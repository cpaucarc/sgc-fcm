<?php

namespace Database\Factories;

use App\Models\ConvalidacionEstudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConvalidacionEstudianteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConvalidacionEstudiante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estudiante_id' => rand(1, 15),
            'convalidacion_id' => rand(1, 3),
        ];
    }
}
