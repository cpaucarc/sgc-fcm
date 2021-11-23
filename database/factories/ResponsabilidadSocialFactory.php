<?php

namespace Database\Factories;

use App\Models\ResponsabilidadSocial;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponsabilidadSocialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResponsabilidadSocial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(10),
            'descripcion' => $this->faker->paragraph(),
            'lugar' => $this->faker->city . ' - ' . $this->faker->state,
            'fecha_inicio' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
            'fecha_fin' => $this->faker->dateTimeBetween($startDate = '+1 months', $endDate = '+7 months'),
            'ciclo_id' => $this->faker->numberBetween(1, 2, 3),
            'escuela_id' => $this->faker->numberBetween(1, 2),
            'empresa_id' => $this->faker->numberBetween(1, 75),
            'docente_responsable_id' => $this->faker->numberBetween(1, 100),
            'estudiante_responsable_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
