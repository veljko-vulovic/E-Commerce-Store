<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'image',
        'category',
        'description',
        'price',
        'featured',
        'on_sale',
        'sale_percent',
        'stock',
    ];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
            'on_sale' => 'boolean',
        ];
    }

    protected function IsInWishlisted(): Attribute
    {

        // $user = User::find(Auth::user());
        return Attribute::make(
            get: function () {
                $user = Auth::user();
                if ($user) {
                    return $user->wishlist->contains('id', $this->id);
                }
                return false;
            },
        );
    }
    public function vendor()
    {
        $this->belongsTo(Vendor::class);
    }
    public function wishlistedByUsers()
    {
        return $this->belongsToMany(User::class, 'wishlist')->withTimestamps();
    }
    public function category()
    {
        return  $this->belongsTo(Category::class);
    }
}
