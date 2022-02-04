<?php

namespace Tests\Feature\Product;

use Tests\TestCase;
use App\Models\{Product, Category};
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_loads_the_form_product_page()
    {
        $this->actingAsUser();

        $product = Product::factory()->create([
            'name' => 'Car',
            'category_id' => Category::factory(),
        ]);

        $this->get('admin/products/'.$product->slug.'/form')
            ->assertStatus(200)
            ->assertSee(trans('Edit Product'));

        $this->assertAuthenticated();
    }

    /** @test */
    function it_update_a_product()
    {
        $this->withExceptionHandling();

        $this->actingAsUser();

        $product = Product::factory()->create([
            'name' => 'Car',
            'description' => 'This is a car',
        ]);

        $this->patch('admin/products/'.$product->slug, [
            'name' => 'Car',
        ])->assertStatus(302);

        $this->assertAuthenticated();
    }

    /** @test */
    function the_name_is_required()
    {
        $this->handleValidationExceptions();

        $this->actingAsUser();

        $product = Product::factory()->create(['name' => '']);

        $this->from('admin/products/'.$product->slug.'/form')
            ->patch('admin/products/'.$product->slug)
            ->assertSessionHasErrors(['name']);

        $this->assertDatabaseMissing('products', ['name' => 'Car']);
    }

    /** @test */
    function the_price_is_required()
    {
        $this->handleValidationExceptions();

        $this->actingAsUser();

        $product = Product::factory()->create(['price' => '']);

        $this->from('admin/products/'.$product->slug.'/form')
            ->patch('admin/products/'.$product->slug, [$product])
            ->assertRedirect('admin/products/'.$product->slug.'/form')
            ->assertSessionHasErrors(['price']);

        $this->assertDatabaseMissing('products', ['price' => 50000]);
    }
}
