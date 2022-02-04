<?php

namespace Tests\Feature\Product;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrashProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_shows_the_products_trasheds()
    {
        Product::factory()->create(['name' => 'Car']);
        Product::factory()->create(['name' => 'Truck']);

        $this->actingAsUser();

        $this->get('admin/products/trash')
            ->assertStatus(200);
    }

    /** @test */
    function it_sends_a_product_to_the_trash()
    {
        $this->withoutExceptionHandling();
        $this->actingAsUser();

        $product = Product::factory()->create(['name' => 'Car']);

        $this->patch('admin/products/trash/'. $product->slug)
            ->assertStatus(302);

        $product->refresh();
        $this->assertTrue($product->trashed());
    }
}
