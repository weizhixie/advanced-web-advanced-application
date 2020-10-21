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
        $snacks = ['Doritos', 'Oreos','Pringles','Reese\'s Peanut Butter Cups',
            'Goldfish', 'Cheetos', 'M&M\'s','Cheez-Its','Haribo gummies','Fritos',
        ];
        return [
            'name' => $snacks[array_rand($snacks)],
            'popularity' => $this->faker->numberBetween(0,10),
            'description' => $this->faker->sentence,
        ];
    }
}
