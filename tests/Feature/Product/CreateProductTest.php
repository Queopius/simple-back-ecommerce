<?php

namespace Tests\Feature\Product;

use Tests\TestCase;
use App\Models\User;
use App\Models\{Category, Product};
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function if_can_view_create_product_page()
    {
        $this->withoutExceptionHandling();

        $this->actingAsUser();

        $this->get(route('admin.products.create'))
            ->assertStatus(200);
    }

    /** @test */
    public function it_can_create_a_product(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create([
            'username' => 'John',
            'email' => 'admin@admin.com'
        ]);

        $category1 = Category::factory()
                ->create(['name' => 'Category 1']);

        $product = Product::factory()
                ->create($this->data($category1));

        $this->actingAsUser($user);

        $this->patch(route('admin.products.create'), $this->data($category1));

        $products = Product::all();
        $product = $products->first();
        $this->assertCount(1, $products);
        $this->assertAuthenticatedAs($user);
        $this->assertEquals('Car', $product->name);
        $this->assertEquals('Car Description', $product->description);

        $this->assertAuthenticated('web');
    }

    protected function data($id)
    {
        return [
            'name' => 'Car',
            'description' => 'Car Description',
            'price' => 33000,
            'category_id' => $id,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
