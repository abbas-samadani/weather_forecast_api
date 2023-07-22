<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test user login and token generation.
     *
     * @return void
     */
    public function testUserLogin()
    {
        $user = User::factory()->create();
        $response = $this->postJson('/api/v1/auth/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['access_token', 'token_type', 'expires_in']);
    }

    public function testGetWeather()
    {
        // Create a user to authenticate the request
        $user = User::factory()->create();

        // Assuming you have the weather data for a specific city in your test database
        $city = 'London';

        $response = $this->actingAs($user, 'api')->getJson("/api/v1/weather/{$city}");

        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['city', 'country', 'lat', 'lon', 'temp_c', 'temp_f', 'condition']]);
    }


}
