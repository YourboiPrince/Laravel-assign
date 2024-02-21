<?php

namespace Database\Factories;

use App\Models\Deal_stage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deal>
 */
class DealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_id' => \App\Models\Organization::factory(),
            'contact_id' => \App\Models\Contact::factory(),
            // 'stage' => \App\Models\DealStage::factory(),
            'value' => $this->faker->randomFloat(2, 1000, 100000),
            'probability' => $this->faker->randomFloat(2, 0, 100),
            'expected_close_date' => $this->faker->date,
            'notes' => $this->faker->text,
        ];
    }
}
