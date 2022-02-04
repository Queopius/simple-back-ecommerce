<?php

namespace Database\Factories;

use App\Models\{Category, Product, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price'     => rand(1500, 50000),
            'category_id' => Category::factory(),
            'user_id'   => User::factory(),
        ];
    }
}
