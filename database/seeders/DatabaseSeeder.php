<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory()->count(10)->create();
         Category::factory()->count(10)->create();
         Product::factory()->count(10)->create();
         Cart::factory()->count(10)->create();
         Order::factory()->count(10)->create();
    }
}
