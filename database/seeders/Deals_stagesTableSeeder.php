<?php

namespace Database\Seeders;

use App\Models\Deal_stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Deals_stagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        \App\Models\User::factory(10)->create();


        Deal_stage::factory(10)->create();
    }
}
