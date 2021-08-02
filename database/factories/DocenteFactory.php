<?php

namespace Database\Factories;

use App\Models\Docente;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocenteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Docente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->numerify('####.#####.####.####'),
            'persona_id' => $this->faker->unique(true)->numberBetween(2, 101),
            'escuela_id' => $this->faker->numberBetween(1, 2),
            'facultad_id' => 1,
        ];
    }
}
