<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'status',
        'price',
        'quantity',
        'total',
    ];

    protected $casts = [
        'product_id' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {

        // dd(json_decode($this->product_id));
        // return $this->hasMany(Product::class, 'id', 'id')
        //     ->whereIn('id', $this->product_id);
        return Product::whereIn('id', json_decode($this->product_id))->get();
        // return $this->hasMany(Product::class, 'id')->whereIn('id', json_decode($this->product_id));
    }
}
