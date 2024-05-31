<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $vendors = Vendor::all();

        return [
            'name' => fake()->words(3, true),
            'image' => fake()->imageUrl(640, 480),
            'description' => fake()->paragraph,
            'price' => fake()->numberBetween(10, 10000),
            'on_sale' => fake()->boolean,
            'featured' => fake()->boolean,
            'sale_percent' => fake()->numberBetween(0, 70),
            'category_id' => fake()->randomElement([1, 2, 3, 4, 5]),
            'stock' => fake()->numberBetween(0, 100),
            // 'vendor_id' => fake()->randomElement($vendors)->id,
        ];
    }
}
