<?php

namespace Database\Factories;

use App\Models\Tesis;
use Illuminate\Database\Eloquent\Factories\Factory;

class TesisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tesis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero_registro'=>$this->faker->numerify('T###'),
            'titulo' => $this->faker->paragraph(),
            'anio'=> $this->faker->numberBetween(1995, 2021),
            'asesor_id' => $this->faker->numberBetween(1, 10),
            'tipo_tesis_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
