<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashBoradTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   /** @test */
    public function try_to_access_to_dashboard_without_login(){

        $response = $this->get(route('admin.dash'));
        $response->assertStatus(302);
    }

    public function try_to_access_to_dashboard_with_login(){

    }
}
