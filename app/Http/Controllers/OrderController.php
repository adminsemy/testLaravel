<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Order;
use App\OrderProduct;
use App\Partner;

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

    public function edit(Order $order)
    {
        $partners = Partner::all();
        $products = OrderProduct::where('order_id', $order->id)->with('product')->get();
        $status = Order::STATUS;
        return view('orders.edit', compact('order', 'partners', 'products', 'status'));
    }

    public function update(Order $order, OrderRequest $request)
    {
        $order->update($request->all());
        OrderProduct::updateQuantity($order->id, $request->only('product')['product']);
        return redirect()->route('listOrders');
    }
}
