<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class productsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::factory()
            ->count(10)
            ->create();
    }
}