<?php

namespace Database\Seeders;

use App\Models\ShoppingBasket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShoppingBasketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShoppingBasket::factory()
            ->count(5)
            ->create();
    }
}
