<?php

namespace Tests\Feature\Category;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
    function if_can_view_create_category_page()
    {
        $this->withoutExceptionHandling();

        $this->actingAsUser();

        $this->get(route('admin.categories.create'))
            ->assertStatus(200);
    }

    /** @test */
    function it_can_create_a_category(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create([
            'username' => 'John',
            'email' => 'admin@admin.com'
        ]);
        $this->actingAsUser($user);

        $category = Category::factory()
                ->create([
                    'name' => 'Category 1',
                    'description' => 'Category 1 description',
                ]);


        $this->patch(route('admin.categories.create', [$category]));

        $categories = Category::all();
        $category = $categories->first();
        $this->assertCount(1, $categories);
        $this->assertAuthenticatedAs($user);
        $this->assertEquals('Category 1', $category->name);
        $this->assertEquals('Category 1 description', $category->description);

        $this->assertAuthenticated('web');
    }
}
