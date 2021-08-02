<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estudiante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->numerify('###.####.###'),
            'persona_id' => $this->faker->unique(true)->numberBetween(102, 201),
            'escuela_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
