<?php

use Illuminate\Database\Seeder;

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Jane Joy', 
        	'email' => 'sales@chnlsgasplant.com',
        	'phone' => '08067405876',
        	'password' => bcrypt('sales')
        ]);
  
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions
       // by chaining
       $role = Role::create(['name' => 'Sales'])->syncPermissions(['make orders', 'edit profile','edit sales']);
       $user->assignRole([$role->id]);
    }
}
