<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->count(3)
            ->hasProducts(2)
            ->create();
        /* Category::create([
            'name' => 'Category 1',
            'slug' => 'category-1',
            'description' => 'Category 1 Description'
        ]);

        Category::create([
            'name' => 'Category 2',
            'slug' => 'category-2',
            'description' => 'Category 2 Description'
        ]);

        Category::create([
            'name' => 'Category 3',
            'slug' => 'category-3',
            'description' => 'Category 3 Description'
        ]); */
    }
}
