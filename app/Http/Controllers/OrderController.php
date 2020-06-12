<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['orderProduct' => function ($query) {
            $query->with('product');
        },
        'partner'
        ])->get();

        $statusOrder = Order::STATUS;

        return view('orders.index', compact('orders', 'statusOrder'));
    }

    public function edit(Order $id)
    {
        # code...
    }
}
