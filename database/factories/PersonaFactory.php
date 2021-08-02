<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dni' => $this->faker->dni,
            'apellidos' => $this->faker->lastName . ' ' . $this->faker->lastName,
            'nombres' => $this->faker->firstName . ' ' . $this->faker->firstName,
        ];
    }
}
