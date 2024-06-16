<?php

namespace App\View\Components\Product;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WishlistButton extends Component
{
    public $product;
    public $isWishlisted;
    public $wishListItemId;


    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->wishListItemId = $product->id;

        // dd($product);
    }

    public function render(): View|Closure|string
    {
        // $isWishListed = $this->product->wishlistedByUsers()->where('user_id', auth()->id())->exists();
        return view(
            'components.product.wishlist-button',
            [
                // 'isWishlisted' => $isWishListed
            ]
        );
    }
}
