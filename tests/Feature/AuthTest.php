<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Passport;
use Tests\TestCase;

class AuthTest extends TestCase
{
    // use RefreshDatabase, WithFaker;

    public function test_can_register_user(): void
    {
        Passport::actingAs(
            User::factory()->create(),
            ['create-servers']
        );

        $params = ['email' => fake()->unique()->safeEmail(), 'password' => 'secret'];

        $response = $this->post('/api/register', $params);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'token',
                    'name',
                ],
            ]);
    }

    public function test_can_login_user(): void
    {
        Passport::actingAs(
            User::factory()->create(),
            ['create-servers']
        );

        $email = fake()->unique()->safeEmail();
        $params = ['email' => $email, 'password' => 'secret'];

        $this->post('/api/register', $params);

        $data = ['email' => $params['email'], 'password' => $params['password']];

        $response = $this->post('/api/login', $data);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'token',
                    'name',
                ],
            ]);
    }
}
