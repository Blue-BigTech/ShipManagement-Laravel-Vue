<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private $accessToken;

    protected function setUp(): void
    {
        parent::setUp();
        User::create([
            'name' => 'test user',
            'email' => 'test@example.com',
            'password' => Hash::make('Password1'),
            'role_type' => 1,
        ]);

        $response = $this->post('/api/login', [
            'email' => 'test@example.com',
            'password' => 'Password1',
        ]);
        $response->assertOk();
        $this->accessToken = $response->decodeResponseJson('access_token');
    }

    public function test_fetch_login_user()
    {
        $response = $this->get('/api/login/user');

        $response->assertStatus(200);
    }

    public function test_create_admin_user()
    {
        $this->postJson('/api/users/admin', [
            'name' => '',
            'email' => 'admin-user1@example.com',
            'password' => 'Password1',
            'role_type' => 1,
        ])->assertStatus(422);

        $this->postJson('/api/users/admin', [
            'name' => '',
            'email' => 'admin-user1@example.com',
            'password' => '',
            'role_type' => 1,
        ])->assertStatus(422);

        $this->postJson('/api/users/admin', [
            'name' => 'test',
            'email' => 'admin-user1@example.com',
            'password' => 'Password1',
            'role_type' => 1,
        ])->assertStatus(201);
    }
}
