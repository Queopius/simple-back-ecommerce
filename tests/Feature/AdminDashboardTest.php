<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admins_can_visit_the_admin_dashboard()
    {
        $this->actingAsUser();

        $this->get('admin/dashboard')
            ->assertStatus(200);
    }
}
