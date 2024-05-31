<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\get;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $products = Product::with('category')
            // ->where('featured', true)
            // ->orWhere('on_sale', true)
            ->get();

        // Separate the products into featured and on-sale collections
        $featuredProducts = $products->filter(function ($product) {
            return $product->featured && !$product->on_sale;
        })->take(4);

        $onSaleProducts = $products->filter(function ($product) {
            return $product->on_sale;
        });

        // Get the cart count for the authenticated user
        // $cart_count = Cart::where('user_id', Auth::id())->count();

        return view('home', [
            'featuredProducts' => $featuredProducts,
            'onSaleProducts' => $onSaleProducts,
            'products' => $products,
            // 'cart_count' => $cart_count
        ]);
    }
}
