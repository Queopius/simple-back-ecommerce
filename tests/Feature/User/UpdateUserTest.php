<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_loads_the_form_user_page()
    {
        $this->actingAsUser();

        $user = User::factory()->create([
            'username' => 'Jhon',
            'first_name' => 'Smith',
            'last_name' => 'Will',
            'email' => 'user@user.com',
        ]);

        $this->get('admin/users/'.$user->id.'/form')
            ->assertStatus(200)
            ->assertSee(trans('Edit User'));
    }

    /** @test */
    function it_update_a_user()
    {
        $this->withoutExceptionHandling();

        $this->actingAsUser();

        $user = User::factory()->create([
            'username' => 'Jhon',
            'first_name' => 'Smith',
            'last_name' => 'Will',
            'email' => 'user@user.com',
            'password' => '$2y$10$PXhr3IgPEMueQtu1ubkEpOMl5OuMWIyO/8L/beOpZljQzoThl9aLK',
        ]);

        $this->patch('admin/users/'.$user->id, [
            'username' => 'Jhon',
            'first_name' => 'Smith',
            'last_name' => 'Will',
            'email' => 'user@user.com',
            'password' => '$2y$10$PXhr3IgPEMueQtu1ubkEpOMl5OuMWIyO/8L/beOpZljQzoThl9aLK',
        ])->assertStatus(302);

        $this->assertCredentials([
            'username' => 'Jhon',
            'first_name' => 'Smith',
            'last_name' => 'Will',
            'email' => 'user@user.com',
            'password' => '$2y$10$PXhr3IgPEMueQtu1ubkEpOMl5OuMWIyO/8L/beOpZljQzoThl9aLK',
        ]);
        $this->assertAuthenticated();
    }

    /** @test */
    function the_username_is_required()
    {
        $this->handleValidationExceptions();

        $this->actingAsUser();

        $user = User::factory()->create(['username' => '']);

        $this->from('admin/users/'.$user->id.'/form')
            ->patch('admin/users/'.$user->id)
            ->assertSessionHasErrors(['username']);

        $this->assertDatabaseMissing('users', ['email' => 'user@user.com']);
    }

    /** @test */
    function the_email_is_required()
    {
        $this->handleValidationExceptions();

        $this->actingAsUser();

        $user = User::factory()->create(['email' => '']);

        $this->from('admin/users/'.$user->id.'/form')
            ->patch('admin/users/'.$user->id, [$user])
            ->assertRedirect('admin/users/'.$user->id.'/form')
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', ['username' => 'Jhon']);
    }

    /** @test */
    function the_first_name_is_required()
    {
        $this->handleValidationExceptions();

        $this->actingAsUser();

        $user = User::factory()->create(['first_name' => '']);

        $this->from('admin/users/'.$user->id.'/form')
            ->patch('admin/users/'.$user->id, [$user])
            ->assertRedirect('admin/users/'.$user->id.'/form')
            ->assertSessionHasErrors(['first_name']);

        $this->assertDatabaseMissing('users', ['username' => 'Jhon']);
    }

    /** @test */
    function the_last_name_is_required()
    {
        $this->handleValidationExceptions();

        $this->actingAsUser();

        $user = User::factory()->create(['last_name' => '']);

        $this->from('admin/users/'.$user->id.'/form')
            ->patch('admin/users/'.$user->id, [$user])
            ->assertRedirect('admin/users/'.$user->id.'/form')
            ->assertSessionHasErrors(['last_name']);

        $this->assertDatabaseMissing('users', ['username' => 'Jhon']);
    }

    /** @test */
    function the_email_must_be_valid()
    {
        $this->handleValidationExceptions();

        $this->actingAsUser();

        $user = User::factory()->create();

        $this->from('admin/users/'.$user->id.'/form')
            ->patch('admin/users/'.$user->id, [
                'email' => 'invalid-email',
            ])
            ->assertRedirect('admin/users/'.$user->id.'/form')
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', ['username' => 'Jhon']);
    }

    /** @test */
    function the_email_must_be_unique()
    {
        $this->handleValidationExceptions();

        $this->actingAsUser();

        User::factory()->create([
            'email' => 'existing-email@example.com',
        ]);

        $user = User::factory()->create([
            'email' => 'user@example.com'
        ]);

        $this->from('admin/users/'.$user->id.'/form')
            ->patch('admin/users/'.$user->id, [
                'email' => 'existing-email@example.com',
            ])
            ->assertRedirect('admin/users/'.$user->id.'/form');
    }

    /** @test */
    function the_users_email_can_stay_the_same()
    {
        $this->handleValidationExceptions();

        $this->actingAsUser();

        $user = User::factory()->create([
            'email' => 'admin@admin.com'
        ]);

        $this->from('admin/users/'.$user->id.'/form')
            ->patch('admin/users/'.$user->id, [
                'email' => 'admin@admin.com',
            ])
            ->assertRedirect('admin/users/'.$user->id.'/form');

        $this->assertDatabaseHas('users', [
            'email' => 'admin@admin.com',
        ]);
    }

    /** @test */
    function the_password_is_optional()
    {
        $this->handleValidationExceptions();

        $this->actingAsUser();

        $oldPassword = 'password';

        $user = User::factory()->create([
            'username' => 'Jhon',
            'email' => 'user@user.com',
            'password' => bcrypt($oldPassword)
        ]);

        $this->from('admin/users/'.$user->id.'/form')
            ->patch('admin/users/'.$user->id, [
                'password' => '',
            ])
            ->assertRedirect('admin/users/'.$user->id.'/form');

        $this->assertCredentials([
            'username' => 'Jhon',
            'email' => 'user@user.com',
            'password' => $oldPassword // VERY IMPORTANT!
        ]);
    }
}
