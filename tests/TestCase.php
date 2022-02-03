<?php

namespace Tests;

use App\Models\User;
use Illuminate\Support\Str;
use Tests\DetectRepeatedQueries;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DetectRepeatedQueries, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        $this->enableQueryLog();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    protected function assertDatabaseEmpty($table, $connection = null)
    {
        $total = $this->getConnection($connection)->table($table)->count();
        $this->assertSame(0, $total, sprintf(
            "Failed asserting the table [%s] is empty. %s %s found.", $table, $total, Str::plural('row', $total)
        ));
    }

    protected function actingAsAdmin($admin = null)
    {
        $admin = $admin ?: $this->createAdmin();

        return $this->actingAs($admin, 'admin');
    }

    protected function actingAsUser($user = null)
    {
        $user = $user ?: $this->createUser();

        return $this->actingAs($user);
    }

    protected function createAdmin(array $attributes = [])
    {
        return User::factory()->create($attributes);
    }

    protected function createUser(array $attributes = [])
    {
        return User::factory()->create($attributes);
    }

    /**
     * Set the currently logged in user for the application.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string|null  $driver
     * @return void
     */
    public function be(UserContract $user, $driver = null)
    {
        $this->app['auth']->guard($driver)->setUser($user);
    }
}
