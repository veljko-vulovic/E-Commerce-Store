<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::where('role', 'vendor')->get();

        return [
            'name' => fake()->company,
            'description' => fake()->optional()->paragraph,
            'logo' => fake()->imageUrl(),
            'user_id' => fake()->randomElement($users)->id,
        ];
    }
}
