<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Category, Product, Review};

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create(
            [
                'name' => 'Category 1',
                'description' => 'Description 1'
            ],
        );

        Category::factory()->create(
            [
                'name' => 'Category 2',
                'description' => 'Description 2'
            ],
        );

        Category::factory()->create(
            [
                'name' => 'Category 3',
                'description' => 'Description 3'
            ],
        );

        Product::factory()->create(
            [
                'name' => 'Product 1',
                'description' => 'Description 1',
                'price' => 100,
                'category_id' => 1,
            ],
        );

        Product::factory()->create(
            [
                'name' => 'Product 2',
                'description' => 'Description 2',
                'price' => 200,
                'category_id' => 1,
            ],
        );

        Product::factory()->create(
            [
                'name' => 'Product 3',
                'description' => 'Description 3',
                'price' => 300,
                'category_id' => 2,
            ],
        );

        Product::factory()->create(
            [
                'name' => 'Product 4',
                'description' => 'Description 4',
                'price' => 400,
                'category_id' => 2,
            ],
        );

        Product::factory()->create(
            [
                'name' => 'Product 5',
                'description' => 'Description 5',
                'price' => 500,
                'category_id' => 3,
            ],
        );

        Product::factory()->create(
            [
                'name' => 'Product 6',
                'description' => 'Description 6',
                'price' => 560,
                'category_id' => 3,
            ],
        );

        Review::factory()->create(
            [
                'rating' => 0.5,
                'comment' => 'Comment 1',
                'product_id' => 1,
                'user_id' => 1,
            ],
        );

        Review::factory()->create(
            [
                'rating' => 4,
                'comment' => 'Comment 2',
                'product_id' => 1,
                'user_id' => 2,
            ],
        );

        Review::factory()->create(
            [
                'rating' => 2.5,
                'comment' => 'Comment 3',
                'product_id' => 2,
                'user_id' => 3,
            ],
        );

        Review::factory()->create(
            [
                'rating' => 2,
                'comment' => 'Comment 4',
                'product_id' => 2,
                'user_id' => 4,
            ],
        );

        Review::factory()->create(
            [
                'rating' => 1.5,
                'comment' => 'Comment 5',
                'product_id' => 3,
                'user_id' => 5,
            ],
        );

        Review::factory()->create(
            [
                'rating' => 3,
                'comment' => 'Comment 6',
                'product_id' => 3,
                'user_id' => 6,
            ],
        );

        Review::factory()->create(
            [
                'rating' => 3.5,
                'comment' => 'Comment 7',
                'product_id' => 4,
                'user_id' => 7,
            ],
        );

        Review::factory()->create(
            [
                'rating' => 0.5,
                'comment' => 'Comment 8',
                'product_id' => 4,
                'user_id' => 8,
            ],
        );

        Review::factory()->create(
            [
                'rating' => 4.5,
                'comment' => 'Comment 9',
                'product_id' => 5,
                'user_id' => 9,
            ],
        );

        Review::factory()->create(
            [
                'rating' => 5,
                'comment' => 'Comment 10',
                'product_id' => 5,
                'user_id' => 10,
            ],
        );

        Review::factory()->create(
            [
                'rating' => 2.5,
                'comment' => 'Comment 11',
                'product_id' => 6,
                'user_id' => 11,
            ],
        );

        Review::factory()->create(
            [
                'rating' => 5,
                'comment' => 'Comment 12',
                'product_id' => 6,
                'user_id' => 12,
            ],
        );
    }
}
