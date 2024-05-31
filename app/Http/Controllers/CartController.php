<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();
        $user = User::find('1');
        $cart = $user->cart()->with('product')->get();
        // $cartItems = Auth::user();
        $total = $user->cart->sum(function ($cart) {
            return $cart->quantity * $cart->product->price;
        });

        return view('cart.index', [
            'carts' => $cart,
            'total' => $total,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);



        $cart = Cart::where('product_id', $product->id)->where('user_id', Auth::id())->first();
        // $cartItem = Auth::user()->cart()->where('product_id', $product->id)->first();

        if ($cart) {
            $cart->increment('quantity', $request->input('quantity', 1));
        } else {
            $cart = new Cart();
            $cart->user_id = Auth::id();
            $cart->product_id = $product->id;
            $cart->quantity = $request->input('quantity', 1);
        }
        $cart->save();


        return back()->with('success', 'Product added to cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        if ($cart) {
            $cart->quantity = $request->input('quantity', $cart->quantity);
            $cart->save();
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

        $cartItem = Cart::where('id', $id)->where('user_id', Auth::id())->first();


        if ($cartItem) {
            $cartItem->delete();
            return back()->with('success', 'Product removed from cart');
        } else {
            return back()->with('error', 'Item not found in your cart');
        }
    }
}
