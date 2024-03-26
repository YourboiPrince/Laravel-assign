<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Invoice_item;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice_item>
 */
class Invoice_itemFactory extends Factory
{
    protected $model = Invoice_item::class;

    public function definition()
    {
        return [
            'invoice_id' => \App\Models\Invoice::factory(),
            'item_name' => $this->faker->word,
            'quantity' => $this->faker->randomNumber(2),
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
