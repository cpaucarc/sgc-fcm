<?php

namespace Database\Factories;

use App\Models\SolicitudConvalidacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudConvalidacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SolicitudConvalidacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estudiante_externo_id' => rand(1, 10),
            'estudiante_id' => rand(1, 15),
            'estado_id' => rand(1, 3)
        ];
    }
}
