<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Habitat;
use App\Models\Lizard;
use App\Models\Prey;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitat>
 */
class HabitatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Habitat::class;

    public function definition(): array
    {
        return [
            "name" => $this->faker->name,
            "biome" => $this->faker->word,
            'temperature' => $this->faker->randomElement(['hot', 'cold', 'mild']),
            'lizard_id' => Lizard::factory(),
            'prey_id' => Prey::factory()
        ];
    }
}
