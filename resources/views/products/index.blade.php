@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
         {{ $products->links() }}
    </div>
    <div class="row justify-content-center">
        <products :products="{{ json_encode($products) }}"></products>
    </div>
</div>
@endsection
