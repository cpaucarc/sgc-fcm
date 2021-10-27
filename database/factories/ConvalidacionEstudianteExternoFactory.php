<?php

namespace Database\Factories;

use App\Models\ConvalidacionEstudianteExterno;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConvalidacionEstudianteExternoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConvalidacionEstudianteExterno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estudiante_externo_id' => rand(1, 50),
            'convalidacion_id' => rand(1, 3),
        ];
    }
}
