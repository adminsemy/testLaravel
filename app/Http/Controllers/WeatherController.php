<?php

namespace App\Http\Controllers;

use App\Http\Services\ApiYandexWeather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function show()
    {
        $apiYandex = new ApiYandexWeather();
        $responseBody = $apiYandex->showWeatherCity('53.2488063', '34.2492743');
        return view('weather.index', [
            'responseBody' => $responseBody
        ]);
    }
}
