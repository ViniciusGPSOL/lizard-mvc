<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lizard;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lizard>
 */
class LizardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Lizard::class;

    public function definition(): array
    {
        return [
            "name" => $this->faker->name,
            "species" => $this->faker->word,
            "age" => $this->faker->numberBetween(1, 13),
            "weight" => $this->faker->randomFloat(2, 0.1, 10.0),
            "description" => $this->faker->sentence,
            "poisonous" => $this->faker->boolean,
            "is_active" => $this->faker->boolean(80),
        ];
    }
}
