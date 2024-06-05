<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemperatureRequest;
use App\Http\Resources\TemperatureCollection;
use App\Models\Temperature;
use Illuminate\Http\Request;


class TemperatureController extends Controller
{
    public function fetch(TemperatureRequest $request) //Return type is depending on return value
    {
        $entries = Temperature::query()
            ->select(['created_at','temperature'])
            ->whereDate('created_at', $request->validated('date'))
            ->orderBy('created_at')
            ->get();

        return new TemperatureCollection($entries);

        //If needed only values, then
        //return response()->json(['data' => $entries->pluck('temperature')]);
    }
}
