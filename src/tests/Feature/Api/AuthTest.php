<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    const BASE_URL = '/api/auth';
    /**
     * A basic feature test example.
     */
    public function test_login(): void
    {
        $response = $this->post(self::BASE_URL . '/login', [
            'email' => 'user@example.com',
            'password' => 'password'
        ]);

        $response->assertStatus(200);
    }

      /**
     * A basic feature test example.
     */
    public function test_register(): void
    {
        $response = $this->post(self::BASE_URL . '/register', [
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => 'password'
        ]); 

        $response->assertStatus(200);
    }


      /**
     * A basic feature test example.
     */
    public function test_logout(): void
    {
        $response = $this->post(self::BASE_URL . '/logout');

        $response->assertStatus(200);
    }
}
