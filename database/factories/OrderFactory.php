<?php

namespace Database\Factories;

use App\Models\User;
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
        $customers = User::where('role', 'customer')->get();

        return [
            'user_id' => fake()->randomElement($customers)->id,
            'total_amount' => fake()->randomFloat(2, 50, 500),
            'status' => fake()->randomElement(['pending', 'confirmed', 'shipped', 'delivered', 'cancelled']),
            'payment_id' => fake()->uuid,
        ];
    }
}
