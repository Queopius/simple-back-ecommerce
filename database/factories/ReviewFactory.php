<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rating' => $this->faker->randomElement([0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5]),
            'comment' => $this->faker->text(),
            'user_id' => rand(1, 30),
            'product_id' => rand(1, 12),
        ];
    }
}
