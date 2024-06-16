<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with(['user'])->paginate(10);
        return view('order.index', compact('orders'));
    }
}
