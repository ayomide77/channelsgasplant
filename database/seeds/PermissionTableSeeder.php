<?php

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
           'create user',
           'edit user',
           'delete user',
           'create role',
           'list role',
           'edit role',
           'delete role',
           'create product',
           'list product',
           'edit product',
           'delete product',
           'edit sales',
           'delete sales',
           'edit orders',
           'delete orders',
           'make orders',
           'edit profile',
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
