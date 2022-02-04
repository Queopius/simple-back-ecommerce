<?php

namespace Tests\Feature\Product;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DestroyProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_completely_destroy_a_admin()
    {
        $this->actingAsUser();

        $product = Product::factory()
                ->create(['deleted_at' => now()]);

        $this->delete('admin/products/'.$product->id.'/delete')
            ->assertRedirect('admin/products/trash');
    }

    /** @test */
    function it_cannot_destroy_a_admin_that_is_not_in_the_trash()
    {
        $this->withExceptionHandling();

        $this->actingAsUser();

        $product = Product::factory()
                ->create(['deleted_at' => null]);

        $this->delete('admin/products/'.$product->id.'/delete')
            ->assertStatus(404);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'deleted_at' => null,
        ]);
    }

    /** @test */
    function it_dissociate_category_if_product_destroy()
    {
        $this->withoutExceptionHandling();

        $this->actingAsUser();

        $category = Category::factory()->create();
        $product = Product::factory()->create([
            'deleted_at' => now(),
            'category_id' => $category->id
        ]);

        $product->category()->dissociate();

        $this->delete('admin/products/'.$product->id.'/delete')
            ->assertRedirect('admin/products/trash');
    }
}
