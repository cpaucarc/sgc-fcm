<?php

namespace Database\Factories;

use App\Models\Investigacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvestigacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Investigacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(15),
            'resumen' => $this->faker->paragraph() . " " . $this->faker->paragraph(),
            'fecha_publicacion' => ($this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'))->format("Y-m-d"),
            'escuela_id' => $this->faker->numberBetween(1, 2),
            'sublinea_id' => $this->faker->numberBetween(1, 7),
            'estado_id' => $this->faker->numberBetween(1, 3)
        ];
    }
}
