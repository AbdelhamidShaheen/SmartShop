<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_list_products(): void
    {
        $response = $this->get('/api/products');
        
          dd($response->json());         
        $response->assertStatus(200);
    }
}
