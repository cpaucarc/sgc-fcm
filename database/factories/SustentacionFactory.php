<?php

namespace Database\Factories;

use App\Models\Sustentacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class SustentacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sustentacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha_sustentacion' => $this->faker->dateTimeBetween('2021-05-01 00:00:00', 'now')->format("Y-m-d"),
            'tesis_id' => $this->faker->numberBetween(1, 20),
            'escuela_id' => $this->faker->numberBetween(1, 2),
            'ciclo_id' => $this->faker->numberBetween(1, 2),
            'declaracion_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
