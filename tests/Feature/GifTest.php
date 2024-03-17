<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class GifTest extends TestCase
{
    private function initialize(): void
    {
        Passport::actingAs(
            User::factory()->create(),
            ['create-servers']
        );
    }

    private function getTokenUser(): string
    {
        $params = ['email' => fake()->unique()->safeEmail(), 'password' => 'secret'];
        $register = $this->json('POST', '/api/register', $params);

        $registerData = json_decode($register->getContent(), true);
        return $registerData['data']['token'];
    }

    public function test_can_search_gif(): void
    {
        $this->initialize();

        $token = $this->getTokenUser();

        $url = '/api/gifs';
        $queryParams = ['query' => 'messi', 'limit' => 12, 'offset' => 1];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $response = $this->json('GET', $url, $queryParams, $headers);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'meta',
                'pagination',
            ]);
    }

    public function test_can_search_gif_by_id(): void
    {
        $this->initialize();

        $token = $this->getTokenUser();

        $url = '/api/gifs';
        $id_gif = 'SSWDmOtwTQ3X5nNBRN';
        $queryParams = ['query' => 'messi', 'limit' => 12, 'offset' => 1];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $response = $this->json('GET', $url . '/' . $id_gif, $queryParams, $headers);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'meta',
            ]);
    }

    public function test_can_save_favorite_gif(): void
    {
        $this->initialize();

        $token = $this->getTokenUser();

        $url = '/api/gifs';
        $id_gif = 'SSWDmOtwTQ3X5nNBRN';
        $queryParams = ['query' => 'messi', 'limit' => 12, 'offset' => 1];
        $headers = ['Authorization' => 'Bearer ' . $token];
        $response = $this->json('GET', $url . '/' . $id_gif, $queryParams, $headers);

        $response->assertStatus(200);
    }
}
