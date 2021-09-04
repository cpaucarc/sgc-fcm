<?php

namespace Database\Factories;

use App\Models\Asesor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsesorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asesor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cip' => $this->faker->unique(true)->numberBetween(1000, 99999),
            'docente_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
