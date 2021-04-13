<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create dummy user
        $user = User::create([
        	'name' => 'John Doe', 
        	'email' => 'john@gmail.com',
        	'phone' => '08067405876',
        	'password' => bcrypt('customer')
        ]);
  
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions
       // by chaining
       $role = Role::create(['name' => 'User'])->syncPermissions(['make orders', 'edit profile']);
       $user->assignRole([$role->id]);
    }
}
