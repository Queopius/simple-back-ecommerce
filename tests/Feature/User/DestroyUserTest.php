<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DestroyUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_completely_destroy_a_admin()
    {
        $this->actingAsUser();

        $user = User::factory()
                ->create(['deleted_at' => now()]);

        $this->delete('admin/users/'.$user->id.'/delete')
            ->assertRedirect('admin/users/trash');
    }

    /** @test */
    public function it_cannot_destroy_a_admin_that_is_not_in_the_trash()
    {
        $this->withExceptionHandling();

        $this->actingAsUser();

        $user = User::factory()
                ->create(['deleted_at' => null]);

        $this->delete('admin/users/'.$user->id.'/delete')
            ->assertStatus(404);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'deleted_at' => null,
        ]);
    }
}
