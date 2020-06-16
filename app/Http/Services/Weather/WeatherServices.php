<?php

namespace App\Http\Services\Weather;

use GuzzleHttp\Client;

class WeatherServices
{
    private $client;
    private $weatherAPI;
    

    public function __construct(WeatherInterface $weatherAPI)
    {
        $this->client = new Client();
        $this->weatherAPI = $weatherAPI;
    }

    public function setParametres($parametres)
    {
        $this->weatherAPI->setParametres($parametres);
    }

    public function showWeatherCity()
    {
        $response = $this->client->request(
            $this->weatherAPI->methodRequset(),
            $this->weatherAPI->getUrl(),
            $this->weatherAPI->getParametres()
        );

        return json_decode($response->getBody());
    }
}