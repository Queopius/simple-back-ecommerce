<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function login_user_screen_can_be_rendered()
    {
        $this->get(route('admin.login'))
            ->assertStatus(200)
            ->assertViewIs('admin.auth.login');
    }

    /** @test */
    function logging_user_as_an_admin()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create([
            'password' => bcrypt($password = 'password'),
        ]);

        $response = $this->post(route('admin.login'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect(RouteServiceProvider::ADMIN);
        $this->assertAuthenticatedAs($user, 'web');
    }

    /** @test */
    function user_cannot_authenticate_with_invalid_email()
    {
        $this->withExceptionHandling();

        $email = 'user@user.com';
        $password = 'password';

        $this->createUser([
            'email' => 'invalid.email@mail.com',
            'password' => bcrypt($password),
        ]);

        $this->from('admin/login')->post('admin/login', compact('email', 'password'))
            ->assertStatus(302)
            ->assertRedirect('admin/login')
            ->assertSessionHasErrors(
                [
                    'email' => 'These credentials do not match our records.'
                ]
            );

        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * @test
     */
    function users_can_not_authenticate_with_invalid_password()
    {
        $this->withExceptionHandling();

        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $this->from('admin/login')->post('admin/login', [
                'email' => $user->email,
                'password' => 'wrong-password',
            ])
            ->assertStatus(302)
            ->assertRedirect('admin/login')
            ->assertSessionHasErrors('email');

        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

}
