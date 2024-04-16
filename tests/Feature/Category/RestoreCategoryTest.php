<?php

namespace Tests\Feature\Category;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RestoreCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_restore_a_category()
    {
        $this->actingAsUser();

        $category = Category::factory()->create([
            'deleted_at' => now()
        ]);

        $this->get(route('admin.categories.restore', $category->id))->assertRedirect();
    }
}
