<?php

namespace Database\Seeders;

use App\Models\Invoice_item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Invoices_itemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();


        Invoice_item::factory(10)->create();
    }
}
