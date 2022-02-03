<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function un_user_administrator_can_view_list_users_page()
    {
        $this->actingAsUser();

        $this->get(route('admin.users'))
            ->assertStatus(200)
            ->assertViewIs('admin.users.index');
    }
}
