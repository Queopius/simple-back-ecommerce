<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RestoreUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_restore_a_admin()
    {
        $this->actingAsUser();

        $user = User::factory()->create([
            'deleted_at' => now()
        ]);

        $this->get(route('admin.users.restore', $user))->assertRedirect();
    }
}
