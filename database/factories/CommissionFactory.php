<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commission>
 */
class CommissionFactory extends Factory
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
            'vendor_id' => fake()->randomElement($vendors)->id,
            'rate' => fake()->randomFloat(2, 1, 10),
        ];
    }
}
