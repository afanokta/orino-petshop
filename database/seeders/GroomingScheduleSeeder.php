<?php

namespace Database\Seeders;

use App\Models\GroomingSchedule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Seeder;

class GroomingScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sessions = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00'];
        $sessions_end = ['09:30', '10:30', '11:30', '12:30', '13:30', '14:30'];
        $dates = CarbonPeriod::create(Carbon::now(), Carbon::now()->addDays(10));
        foreach ($dates as $date) {
            foreach ($sessions as $key => $session) {
                GroomingSchedule::create([
                    'date' => $date->format('Y-m-d'),
                    'session' => $session,
                    'session_end' => $sessions_end[$key],
                ]);
            }
        }
    }
}
