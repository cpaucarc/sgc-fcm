<?php

namespace Database\Factories;

use App\Models\BachillerTesis;
use Illuminate\Database\Eloquent\Factories\Factory;

class BachillerTesisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BachillerTesis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bachiller_Id' => $this->faker->numberBetween(1, 50),
            'tesis_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
