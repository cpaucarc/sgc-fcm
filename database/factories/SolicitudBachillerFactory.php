<?php

namespace Database\Factories;

use App\Models\SolicitudBachiller;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudBachillerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SolicitudBachiller::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estudiante_id' => rand(1, 100),
            'estado_id' => rand(1, 3)
        ];
    }
}
