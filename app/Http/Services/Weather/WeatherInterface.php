<?php

namespace App\Http\Services\Weather;

interface WeatherInterface
{
    public function setParametres($parametres);
    public function getUrl();
    public function methodRequset();
    public function getParametres();
}
