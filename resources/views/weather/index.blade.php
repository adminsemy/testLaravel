@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="content">
        <div class="col-12">
            <a href="{{$responseBody->info->url}}"><img src="{{ asset('image/YandexWeather.svg')}}" alt="Яндекс погода"></a>
                <div class="font-weight-bold">
                    <h1>{{ $city }}</h1>
                </div>
                <div class="font-weight-bold">Сейчас - {{$responseBody->fact->temp}} (°C)</div>
                <div class="text">Утром - {{$responseBody->forecasts[0]->parts->morning->temp_avg}}</div>
                <div class="text">Вечером - {{$responseBody->forecasts[0]->parts->evening->temp_avg}}</div>
            </div>
        </div>
    </div>
</div>
@endsection
