<?php

namespace Database\Factories;

use App\Models\FinanciadorInvestigacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class FinanciadorInvestigacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FinanciadorInvestigacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'presupuesto' => $this->faker->randomFloat(2, 1000, 1500000),
            'investigacion_id' => $this->faker->numberBetween(1, 200),
            'financiador_id' => $this->faker->numberBetween(1, 4)
        ];
    }
}
