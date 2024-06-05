<?php

namespace App\Services;

use App\Models\Temperature;

class CityTemperatureService
{
    public function __construct(readonly string $city, readonly TemperatureApiService $temperatureApiService)
    {}

    public function fetch() : void
    {
        $temperature = new Temperature();
        $temperature->temperature = $this->temperatureApiService->getTemperature($this->city);
        $temperature->save();
    }



}
