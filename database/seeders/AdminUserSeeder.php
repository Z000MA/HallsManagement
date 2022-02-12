<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Developer',
            'email' => 'developer@admin.com',
            'phone' => '0961595792',
            'password' => Hash::make('123123'),
            'is_admin' => 1
        ]);
    }
}
