<?php

use App\Http\Controllers\CartController;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\post;

it('user can view cart with items and total price', function () {


    $user = User::factory()->create();
    Auth::login($user);
    $product = Product::factory()->create(['price' => 100]);
    $cart = Cart::firstOrCreate(['user_id' => $user->id]);
    $cartItem = $cart->items()->create([
        'user_id' => $user->id,
        'cart_id' => $cart->id,
        'product_id' => $product->id,
        'quantity' => 2,
        'total_price' => 200
    ], $product->id);

    $response = $this->get(route('cart.index'));

    // dd($response);

    $response->assertStatus(200);
    expect($response['cart']->id)->toBe($cart->id);
    expect($response['cartItems']->first()->id)->toBe($cartItem->id);
    expect($response['total'])->toBe(200.0);
});

test('user can add product to cart', function () {
    $user = User::factory()->create();
    Auth::login($user);
    $product = Product::factory()->create(['stock' => 10]);
    $response = $this->post(route('cart.store', $product));

    $response->assertStatus(302);
    expect(session('success'))->toBe('Product added to cart');
});
