<?php
namespace App\Services;

use App\Contracts\RapidApiServiceProvider;

class WeatherService
{
    protected RapidApiServiceProvider $rapidApiService;

    public function __construct(RapidApiServiceProvider $rapidApiService)
    {
        $this->rapidApiService = $rapidApiService;
    }

    public function getWeatherBasedOnLocation(string $city): iterable
    {
        $uri = "/current.json?q={$city}";
        $data = $this->rapidApiService->getIterableFromProvider($uri);
        return collect($data);
    }
}
