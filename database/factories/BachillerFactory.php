<?php

namespace Database\Factories;

use App\Models\Bachiller;
use Illuminate\Database\Eloquent\Factories\Factory;

class BachillerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bachiller::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estudiante_id' => $this->faker->numberBetween(1, 100),
            'ciclo_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
