<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\Snack;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        $title = ['Great Snack', 'Top Snack', 'Best Snack'];
        $users = User::all();
        $snacks = Snack::all();

        return [
            'title' => $title[array_rand($title)],
            'body' => $this->faker->sentence,
            'rating' => $this->faker->numberBetween(1,5),
            'user_id' => $users->random()->id,
            'snack_id' => $snacks->random()->id,
        ];
    }
}
