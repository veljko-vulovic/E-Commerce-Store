<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Commission;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Vendor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Pest\Laravel\call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->create([
            'name' => 'Test Admin User',
            'email' => 'admin@email.com',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Test Vendor User',
            'email' => 'vendor@email.com',
            'role' => 'vendor',
        ]);
        User::factory()->create([
            'name' => 'Test Customer User',
            'email' => 'customer@email.com',
            'role' => 'customer',
        ]);
        // User::factory(12)->create();
        Vendor::factory(10)->create();
        // Product::factory(20)->create();
        // Order::factory(10)->create();
        // Review::factory(10)->create();
        Commission::factory(10)->create();
        Category::factory(10)->create();

        // Cart::factory(50)->create();
    }
}
