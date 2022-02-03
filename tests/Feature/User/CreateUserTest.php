<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use App\Events\User\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
use App\Mail\User\PleaseConfirmYourEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * User can view create user.
     *@test
     * @return void
     */
    function if_can_view_create_user_page()
    {
        $this->withoutExceptionHandling();

        $this->actingAsUser();

        $this->get(route('admin.users.create'))
            ->assertStatus(200);
    }

    /**
     * User create a user.
     *@test
     * @return void
     */
    function it_can_create_a_user(): void
    {
        $this->withExceptionHandling();

        $user = User::factory()->create([
            'username' => 'John',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
        ]);

        $this->actingAsUser($user);

        $this->patch(route('admin.users.create'), [
            'username' => 'John',
            'email' => 'user@user.com',
            'password' => '$2y$10$PXhr3IgPEMueQtu1ubkEpOMl5OuMWIyO/8L/beOpZljQzoThl9aLK',
            'password_confirmation' => '$2y$10$PXhr3IgPEMueQtu1ubkEpOMl5OuMWIyO/8L/beOpZljQzoThl9aLK',
        ]);

        $users = User::all();
        $user = $users->first();
        $this->assertCount(1, $users);
        $this->assertAuthenticatedAs($user);
        $this->assertEquals('John', $user->username);
        $this->assertEquals('user@user.com', $user->email);
        $this->assertTrue(Hash::check('password', $user->password));

        $this->assertAuthenticated('web');
    }
}
