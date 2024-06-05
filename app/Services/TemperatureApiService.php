<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class TemperatureApiService
{

    private PendingRequest $client;

    public function __construct(readonly string $apikey)
    {
        $this->client = Http::baseUrl('https://api.weatherapi.com/v1/')->withHeaders([
            'accept' => 'application/json'
        ]);
    }

    private function makeRequest(string $endpoint, array $params) : array
    {
        $params['key'] = $this->apikey;
        return $this->client->get($endpoint, $params)->throw()->json();
    }

    public function getTemperature(string $city) : string
    {
        $result = $this->makeRequest('current.json', ['q' => $city]);
        return data_get($result, 'current.temp_c');
    }

}
