<?php

namespace Database\Factories;

use App\Models\Snack;
use Illuminate\Database\Eloquent\Factories\Factory;

class SnackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Snack::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'popularity' => $this->faker->numberBetween(0,10),
            'description' => $this->faker->sentence,
        ];
    }
}
