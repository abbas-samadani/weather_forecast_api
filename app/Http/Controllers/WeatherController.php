<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherResource;
use App\Services\WeatherService;
use Illuminate\Http\Response;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService) {
        $this->weatherService = $weatherService;
    }

    public function getWeather(string $city)
    {
        $data = $this->weatherService->getWeatherBasedOnLocation($city);
        $modifiedData = new WeatherResource($data);
        return response()->json(['data' => $modifiedData ], Response::HTTP_OK);
    }
}
