@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID заказа</th>
                    <th scope="col">Название партнера</th>
                    <th scope="col">Стоимость заказа</th>
                    <th scope="col">Состав заказа</th>
                    <th scope="col">Статус заказа</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><a target="_blank" href="{{ route('order.edit', $order->id ) }}">{{ $order->id }}</a></td>
                        <td>{{ $order->partner->name }}</td>
                        <td>
                            @php($sum=0)
                            @foreach($order->orderProduct as $orderProduct)
                            @php($sum += $orderProduct->price * $orderProduct->quantity)
                            @endforeach
                            {{ $sum }}
                        </td>
                        <td>
                            @foreach($order->orderProduct as $orderProduct)
                            <p>{{ $orderProduct->product->name}}</p>
                            @endforeach
                        </td>
                        <td>{{ $statusOrder[$order->status] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
