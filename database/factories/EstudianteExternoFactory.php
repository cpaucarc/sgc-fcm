<?php

namespace Database\Factories;

use App\Models\EstudianteExterno;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteExternoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EstudianteExterno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'persona_id' => $this->faker->unique(true)->numberBetween(102, 201),
            'institucion_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
