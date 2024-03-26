<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Deal_stage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deal_stage>
 */
class Deal_stageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, // Example for the 'name' field
            'created_at' => now(),
            'updated_at' => now(),
            // Add definitions for other fields if needed
        ];
    }
}
