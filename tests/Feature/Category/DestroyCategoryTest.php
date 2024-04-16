<?php

namespace Tests\Feature\Category;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DestroyCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_completely_destroy_a_category()
    {
        $this->actingAsUser();

        $category = Category::factory()
                ->create(['deleted_at' => now()]);

        $this->delete('admin/categories/'.$category->id.'/delete')
            ->assertRedirect('admin/categories/trash');
    }

    /** @test */
    public function it_cannot_destroy_a_category_that_is_not_in_the_trash()
    {
        $this->withExceptionHandling();

        $this->actingAsUser();

        $category = Category::factory()
                ->create(['deleted_at' => null]);

        $this->delete('admin/categories/'.$category->id.'/delete')
            ->assertStatus(404);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'deleted_at' => null,
        ]);
    }
}
