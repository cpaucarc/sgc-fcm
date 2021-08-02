<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->company,
            'ruc' => $this->faker->numberBetween(20000000000, 29999999999),
            'telefono' => $this->faker->numberBetween(900000000, 999999999),
            'correo' => $this->faker->companyEmail,
            'direccion' => $this->faker->streetAddress,
            'ubicacion' => $this->faker->city . ' - ' . $this->faker->country
        ];
    }
}
