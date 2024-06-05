<?php

namespace App\Console\Commands;

use App\Services\CityTemperatureService;
use Illuminate\Console\Command;

class FetchTemperature extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-temperature';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(CityTemperatureService $cityTemperatureService)
    {
        $cityTemperatureService->fetch();
    }
}
