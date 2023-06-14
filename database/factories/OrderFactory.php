<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carts = Cart::pluck('id')->toArray();
        $users = Category::pluck('id')->toArray();

        return [
            'status' => fake()->randomElement(['pending', 'processing', 'payment_failed', 'completed']),
            'cart_id' => fake()->randomElement($carts),
            'user_id' => fake()->randomElement($users),
        ];
    }
}
