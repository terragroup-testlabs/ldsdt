<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use App\Models\Temperature;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $hours = 96;
        $now = Carbon::now();

        for($hoursBack = $hours; $hoursBack >= 0; $hoursBack--) {
            Temperature::factory()->create(['created_at' => $now->subHour()]);
        }

    }
}
