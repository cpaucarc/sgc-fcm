<?php

namespace Database\Factories;

use App\Models\JuradoSustentacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class JuradoSustentacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JuradoSustentacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jurado_id' => $this->faker->numberBetween(1, 10),
            'sustentacion_id' => $this->faker->numberBetween(1, 20),
            'cargo_jurado_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
