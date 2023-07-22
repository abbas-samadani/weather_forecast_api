<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'city' => $this['location']['name'],
            'country' => $this['location']['country'],
            'lat' => $this['location']['lat'],
            'lon' => $this['location']['lon'],
            'temp_c' => $this['current']['temp_c'],
            'temp_f' => $this['current']['temp_f'],
            'condition' => $this['current']['condition']['text']
        ];
    }
}
