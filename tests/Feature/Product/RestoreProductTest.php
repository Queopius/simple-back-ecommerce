<?php

namespace Tests\Feature\Product;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RestoreProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_can_restore_a_product()
    {
        $this->actingAsUser();

        $product = Product::factory()->create([
            'deleted_at' => now()
        ]);

        $this->get(route('admin.products.restore', $product->id))->assertRedirect();
    }
}
