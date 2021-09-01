<?php

namespace Database\Factories;

use App\Models\InvestigadorInvestigacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvestigadorInvestigacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InvestigadorInvestigacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'es_responsable' => $this->faker->boolean(75),
            'investigacion_id' => $this->faker->numberBetween(1, 200),
            'investigador_id' => $this->faker->numberBetween(1, 100)
        ];
    }
}
