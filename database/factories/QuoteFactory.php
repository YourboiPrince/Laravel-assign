<?php

namespace Database\Factories;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quote::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'deal_id' => $this->faker->numberBetween(1, 100),
            'account_id' => $this->faker->numberBetween(1, 50),
            'contact_id' => $this->faker->numberBetween(1, 50),
            'quote_date' => $this->faker->date,
            'expiry_date' => $this->faker->date,
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['draft', 'pending', 'accepted']),
            // Add other columns and their default values if needed
        ];
    }
}
