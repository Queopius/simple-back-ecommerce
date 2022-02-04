<?php

namespace Tests\Feature\Category;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function un_user_administrator_can_view_list_categories_page()
    {
        $this->actingAsUser();

        $this->get(route('admin.categories'))
            ->assertStatus(200)
            ->assertViewIs('admin.categories.index');
    }
}
