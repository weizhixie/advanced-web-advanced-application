<?php

namespace Database\Factories;

use App\Models\Snack;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SnackFactory extends Factory
{
    protected $model = Snack::class;

    public function definition()
    {
        $snacks = ['Doritos', 'Oreos','Pringles','Reese\'s Peanut Butter Cups',
            'Goldfish', 'Cheetos', 'M&M\'s','Cheez-Its','Haribo gummies','Fritos',
            'Kit Kat', 'Lays', 'Twix', 'Combos', 'Starburst', 'Snickers', 'Gardetto\'s',
            'Chex Mix', 'Flipz', 'Ruffles',
        ];

        $users = User::all();

        return [
            'name' => $snacks[array_rand($snacks)],
            'popularity' => $this->faker->numberBetween(0,10),
            'description' => $this->faker->sentence,
            'user_id' => $users->random()->id,
        ];
    }
}
