<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Lizard;
use App\Models\Habitat;
use App\Models\Prey;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class HabitatApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_can_get_all_habitats(): void
    {
        Habitat::factory()->count(3)->create();

        $response = $this->getJson('api/habitats');

        $response->assertStatus(201);
        $this->assertCount(3, $response->json());
    }

    public function test_can_get_relationship(): void
    {
        Lizard::factory()->count(4)->create();
        Prey::factory()->count(4)->create();
        Habitat::factory()->count(4)->create();
        $response = $this->getJson("api/habitats/" . Habitat::pluck('id')->first());

        $this->assertContains($response['lizard_id'], Lizard::pluck('id'));
        $this->assertContains($response['prey_id'], Prey::pluck('id'));
    }
}
