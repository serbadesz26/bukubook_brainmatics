<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_registraton_form_can_be_accessed(): void
    {
        $response = $this->get('/register');

        $response->assertOk();
    }

    public function test_new_user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'testing@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $user = User::where('email', 'testing@example.com');
        $this->assertTrue($user->exists());
 
        $this->assertAuthenticated();

        $response->assertRedirect('/home');
    }

    /** @test */

    public function user_register_only_input_username()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
        ]);

        $response->assertInvalid();
    }
}
