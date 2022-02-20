<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create(['name' => 'Pending']);
        State::create(['name' => 'Approved']);
        State::create(['name' => 'Canceled']);
    }
}
