<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\{RefreshDatabase};

class UserListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_user_administrator_can_view_list_users_page()
    {
        $this->actingAsUser();

        $this->get(route('admin.users'))
            ->assertStatus(200)
            ->assertViewIs('admin.users.index');
    }
}
