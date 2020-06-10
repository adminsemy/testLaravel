<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class ApiYandexWeather
{
    private $client;
    private const LANG = 'ru_RU';

    public function __construct()
    {
        $this->client = new Client([
            'headers' => 
            [
                'X-Yandex-API-Key' => env('API_YANDEX_WEATHER_KEY')
            ]
        ]);
    }

    public function showWeatherCity($lat, $lon)
    {
        $query = [
            'lat' => $lat,
            'lon' => $lon,
            'lang' => self::LANG
        ];
        
        $response = $this->client->request('GET', 'https://api.weather.yandex.ru/v1/forecast',[
            'query' => $query
        ]);

        return json_decode($response->getBody());
    }
}
