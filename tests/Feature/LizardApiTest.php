<?php

namespace Tests\Feature; // Change to Feature namespace

use Tests\TestCase;
use App\Models\Lizard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class LizardApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
    }

    //basic crud testing:

    public function test_can_get_all_lizards()
    {
        Lizard::factory()->count(3)->create();

        $response = $this->getJson('/api/lizards');

        $response->assertStatus(200);
        $this->assertCount(3, $response->json());
    }

    public function test_can_create_lizard()
    {
        $lizardData = [
            "name" => $this->faker->name,
            "species" => $this->faker->name,
            "age" => $this->faker->numberBetween(0, 21452352),
            "description" => $this->faker->sentence,
            "wheight" => $this->faker->randomFloat(2, 0.01, 50.0),
            "poisonous" => $this->faker->boolean
        ];

        $response = $this->postJson('/api/lizards', $lizardData);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'name' => $lizardData['name'],
            ]);
    }


}
