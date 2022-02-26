<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'Halls-list',
            'Halls-create',
            'Halls-edit',
            'Halls-delete',
            'Reservations-list',
            'Reservations-create',
            'Reservations-edit',
            'Reservations-delete',
            'Payments-list',
            'Payments-create',
            'Payments-edit',
            'Payments-delete',
            'Reports-list'
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
