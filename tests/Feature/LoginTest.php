<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(404);
    }

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('theadmin/appLogin');

        $response->assertSuccessful();
        $response->assertViewIs('theme_a.login.index');
    }

    /* public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = Admin::factory()->make();

        $response = $this->actingAs($user)->get(route('admin.login'));

        $response->assertRedirect('/');
    }*/
    /** @test */
    public function it_logs_user_in_with_correct_credentials()
    {
        // Given
        $password = '123456789@';
        $data = [
            'nom' => 'Merzougui',
            'prenom' => 'Abdelghafour',
            'email' => 'goldvision93@gmail.com',
            'password' => bcrypt($password)
        ];
        $user = Admin::first();

        // When
        $response = $this->post(route('admin.login'), [
            'email' => $user->email,
            'password' => "123456789@",
        ]);

        // Then
        $this->assertAuthenticatedAs($user,'admin');
    }
}
