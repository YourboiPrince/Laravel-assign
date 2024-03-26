<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'account_id' => $this->faker->numberBetween(1, 10),
            'contact_id' => $this->faker->numberBetween(1, 10),
            // 'quote_id' => $this->faker->numberBetween(1, 10),
            'invoice_number' => $this->faker->text(20),
            'invoice_date' => $this->faker->date,
            'due_date' => $this->faker->date,
            'total' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
