<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CoffeeProduct;
class CoffeeProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CoffeeProduct::create([
            'name' => 'Gold Coffee',
            'profit_margin' => 0.25,
        ]);

        CoffeeProduct::create([
            'name' => 'Arabic Coffee',
            'profit_margin' => 0.15,
        ]);
    }
}
