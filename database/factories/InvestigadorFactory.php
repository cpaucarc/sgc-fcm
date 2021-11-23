<?php

namespace Database\Factories;

use App\Models\Investigador;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvestigadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Investigador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $esDocente = $this->faker->boolean(65); //65% probab. de ser docente | 35% estudiante

        return [
            'correo' => $this->faker->email,
            'sitio_web' => $this->faker->url,
            'foto' => null,
//            'foto' => 'storage/investigadores/' . $this->faker->image('public/storage/investigadores', 400, 300, null, false),
            'grado_academico_id' => $this->faker->numberBetween(5, 7), //5: Mag, 6: Doctor, 7:PhD
            'categoria_id' => $this->faker->numberBetween(1, 3),
            'estudiante_id' => $esDocente ? null : $this->faker->unique(true)->numberBetween(1, 100),
            'docente_id' => $esDocente ? $this->faker->unique(true)->numberBetween(1, 100) : null,
        ];
    }
}
