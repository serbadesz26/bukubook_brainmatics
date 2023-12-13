<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_user_can_login(): void
    {
        $user = User::create([
            'name' => 'brain',
            'email' => 'brain@gmail.com',
            'password' => Hash::make('123456'),
            'roles' => 'ADMIN',
        ]);

        $this->assertTrue($user->exists());
        
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '123456',
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect('/home');

        $response = $this->get('/home');

        $response->assertSee('Welcome');
    }
}
