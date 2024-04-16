<?php

namespace Tests\Feature\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_user_administrator_can_view_list_products_page()
    {
        $this->actingAsUser();

        $this->get(route('admin.products'))
            ->assertStatus(200)
            ->assertViewIs('admin.products.index');
    }
}
