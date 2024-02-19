<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'published_at' => $this->faker->optional(0.7)->dateTimeBetween('-1 month', '+1 month'),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id; // Assuming you have a User model
            },
        ];
    }
}
