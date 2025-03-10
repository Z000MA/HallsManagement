<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use database\seeds;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PeriodsSeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(AdminUserSeeder::class);
    }
}
