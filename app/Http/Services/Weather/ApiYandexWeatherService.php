<?php

namespace App\Http\Services\Weather;


class ApiYandexWeatherService implements WeatherInterface
{
    public const LANG = 'ru_RU';
    private $url = 'https://api.weather.yandex.ru/v1/forecast';
    private $methodRequest = 'GET';
    private $query = [
        'lang' => self::LANG
    ];
    private $headers = [];

    public function setParametres($parametres)
    {
        $this->query += $parametres['query'];
        if (isset($parametres['ApiYandexKey'])) {
            $this->setApiYandexKey($parametres['ApiYandexKey']);
        } else {
            $this->setApiYandexKey(env('API_YANDEX_WEATHER_KEY'));
        }
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function methodRequset()
    {
        return $this->methodRequest;
    }

    public function getParametres()
    {
        return [
            'query' => $this->query,
            'headers' => $this->headers
        ];
    }

    private function setApiYandexKey($key)
    {
        $this->headers = [
                'X-Yandex-API-Key' => $key
            ];
    }
}
