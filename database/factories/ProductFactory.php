<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $categories = Category::pluck('id')->toArray();

        return [
            'name' => fake()->word(),
            'description' => fake()->sentence(45),
            'slug' => fake()->unique()->slug,
            'weight' => fake()->randomNumber(3),
            'width' => fake()->randomNumber(2),
            'height' => fake()->randomNumber(2),
            'price' => fake()->randomNumber(5),
            'category_id' => fake()->randomElement($categories),
        ];
    }
}
