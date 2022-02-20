<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReservationPeriod;

class PeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationPeriod::create([
            'name' => 'Breakfast',
            'start' => '08:00',
            'end' => '12:00'
        ]);
        ReservationPeriod::create([
            'name' => 'Lunch',
            'start' => '13:00',
            'end' => '17:00'
        ]);
        ReservationPeriod::create([
            'name' => 'Dinner',
            'start' => '19:00',
            'end' => '23:00'
        ]);
    }
}
