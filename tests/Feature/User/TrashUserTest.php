<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrashUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_the_admins_trasheds()
    {
        User::factory()->create(['username' => 'Jhon']);
        User::factory()->create(['username' => 'Jane']);

        $this->actingAsUser();

        $this->get('admin/users/trash')
            ->assertStatus(200);
    }

    /** @test */
    public function it_sends_a_admin_to_the_trash()
    {
        $this->withExceptionHandling();
        $this->actingAsUser();

        $user = User::factory()->create(['username' => 'Jhon']);

        $this->patch('admin/users/trash/'.$user->id)
            ->assertStatus(302);

        $user->refresh();
        $this->assertTrue($user->trashed());
    }
}
