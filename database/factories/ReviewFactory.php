<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = Product::all();
        $customers = User::where('role', 'customer')->get();

        return [
            'product_id' => fake()->randomElement($products)->id,
            'user_id' => fake()->randomElement($customers)->id,
            'rating' => fake()->numberBetween(1, 5),
            'comment' => fake()->optional()->paragraph,

        ];
    }
}
