<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Prey;

class PreyApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_can_get_all_preys(): void
    {
        Prey::factory()->count(3)->create();
        $response = $this->getJson('/api/preys');
        $this->assertCount(3, $response->json());
    }

}
