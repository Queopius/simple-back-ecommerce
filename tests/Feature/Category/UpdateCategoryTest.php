<?php

namespace Tests\Feature\Category;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_loads_the_form_caategory_page()
    {
        $this->actingAsUser();

        $category = Category::factory()->create([
            'name' => 'Category 1',
        ]);

        $this->get('admin/categories/'.$category->slug.'/form')
            ->assertStatus(200)
            ->assertSee(trans('Edit Category'));

        $this->assertAuthenticated();
    }

    /** @test */
    public function it_update_a_category()
    {
        $this->withoutExceptionHandling();

        $this->actingAsUser();

        $category = Category::factory()->create([
            'name' => 'Category 1',
            'description' => 'Category 1 description',
        ]);

        $this->patch('admin/categories/'.$category->slug, [
            'name' => 'Category 2',
            'description' => 'Category 2 description',
        ])->assertStatus(302);

        $this->assertAuthenticated();
    }

    /** @test */
    public function the_name_is_required()
    {
        $this->handleValidationExceptions();

        $this->actingAsUser();

        $category = Category::factory()->create(['name' => '']);

        $this->from('admin/categories/'.$category->slug.'/form')
            ->patch('admin/categories/'.$category->slug)
            ->assertSessionHasErrors(['name']);

        $this->assertDatabaseMissing('categories', ['name' => 'Category 1']);
    }
}
