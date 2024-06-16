<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // $cart = $user->cart()->first();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);


        if ($cart) {
            $cartItems = $cart->items()->with('product')->get();
            $total = $cartItems->sum('total_price');
        } else {
            $cartItems = collect();
            $total = 0;
        }

        return view('cart.index', compact('cart', 'cartItems', 'total'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $userId = Auth::id();
        $cart = Cart::firstOrCreate(['user_id' => $userId]);

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            if ($request->input('quantity', $cartItem->quantity) <= $product->stock) {
                $cartItem->increment('quantity', $request->input('quantity', 1));
                $cartItem->total_price = $product->price * $cartItem->quantity;
                $cartItem->save();
            } else {
                return back()->with('error', 'Max quantity is ' . $product->stock);
            }
        } else {
            if ($request->input('quantity', 1) <= $product->stock)
                $cart->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $request->input('quantity', 1),
                    'total_price' => $product->price * $request->input('quantity', 1)
                ]);

            else
                return back()->with('error', 'There is no stock left for this product');
        }

        return back()->with('success', 'Product added to cart');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $userId = Auth::id();
        $cart = Cart::firstOrCreate(['user_id' => $userId]);
        $cartItem = $cart->items()->where('product_id', $product->id)->first();


        if ($cartItem) {
            if ($request->input('quantity', $cartItem->quantity) <= $product->stock) {
                $cartItem->quantity = $request->input('quantity', $cartItem->quantity);
                $cartItem->total_price = $product->price * $cartItem->quantity;
                $cartItem->save();
            } else {
                return back()->with('error', 'Max quantity is ' . $product->stock);
            }


            return back()->with('success', 'Cart updated');
        } else {
            return back()->with('error', 'Item not found in your cart');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $cartItem = CartItem::where('id', $id)->first();


        if ($cartItem) {
            $cartItem->delete();
            return back()->with('success', 'Product removed from cart');
        } else {
            return back()->with('error', 'Item not found in your cart');
        }
    }
}
