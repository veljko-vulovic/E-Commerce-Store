<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = $this->faker->numberBetween(1, 10);
        $product = Product::factory()->create()->price;

        return [
            'cart_id' => Cart::factory()->create()->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price,
            'total_price' => $product->price * $this->$quantity
        ];
    }
}
