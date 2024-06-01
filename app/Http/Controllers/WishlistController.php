<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Whishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {

        return view('wishlist.index', [
            'wishlists' => auth()->user()->wishlist,
        ]);
    }

    public function store(Request $request, Product $product)
    {
        // auth()->user()->wishlist()->attach($product);
        //intelephense bug doesnt see wishlist on auth user
        User::find(auth()->id())->wishlist()->attach($product);
        return back()->with('success', 'Product added to wishlist');
    }

    public function destroy($id)
    {

        $wishlistItem = Whishlist::where('product_id', $id)->where('user_id', Auth::id())->first();
        $wishlistItem->delete();
        return back()->with('success', 'Product removed from wishlist');
    }
}
