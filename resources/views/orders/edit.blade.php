@extends('layouts.app')
@section('content')
<div class="container">

    <form method="POST" id="Edit" action="{{ route('order.update', $order->id) }}">
        {{ csrf_field() }}
        <order-edit 
        :order="{{ json_encode($order) }}"
        :partners="{{ json_encode($partners) }}"
        :products="{{ json_encode($products) }}"
        :status="{{ json_encode($status) }}"
        ></order-edit>
        <div class="form-group row align-self-center">
            <div class="col-md-10 offset-md-10">
                <button type="submit" class="btn btn-primary align-right">
                Сохранить
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
