<?php

namespace App\Http\Controllers;

use App\Http\Services\Weather\ApiYandexWeatherService;
use App\Http\Services\Weather\WeatherServices;

class WeatherController extends Controller
{
    public function show($city)
    {
        $apiYandex = new WeatherServices(new ApiYandexWeatherService);
        //Здесь нужна выборка из базы по поординатам и названию города. Пока простая заглушка
        $city = 'Брянск';
        $apiYandex->setParametres([ 'query' => ['lat' => '53.2488063', 'lon' => '34.2492743']]);
        $responseBody = $apiYandex->showWeatherCity();
        return view('weather.index', [
            'responseBody' => $responseBody,
            'city' => $city
        ]);
    }
}
