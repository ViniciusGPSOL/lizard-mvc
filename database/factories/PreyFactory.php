<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prey;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prey>
 */
class PreyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Prey::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'height' => $this->faker->randomFloat(2, 0.1, 4.0),
            'weight' => $this->faker->randomFloat(2, 0.1, 4.0),
            'description' => $this->faker->sentence,
            'species' => $this->faker->word,
        ];
    }
}
