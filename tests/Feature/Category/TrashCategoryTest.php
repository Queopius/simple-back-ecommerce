<?php

namespace Tests\Feature\Category;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrashCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_shows_the_categories_trasheds()
    {
        Category::factory()->create(['name' => 'Car']);
        Category::factory()->create(['name' => 'Truck']);

        $this->actingAsUser();

        $this->get('admin/categories/trash')
            ->assertStatus(200);
    }

    /** @test */
    function it_sends_a_category_to_the_trash()
    {
        $this->withoutExceptionHandling();
        $this->actingAsUser();

        $category = Category::factory()->create(['name' => 'Car']);

        $this->patch('admin/categories/trash/'. $category->slug)
            ->assertStatus(302);

        $category->refresh();
        $this->assertTrue($category->trashed());
    }
}
