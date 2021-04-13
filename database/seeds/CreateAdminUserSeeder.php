<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Ayomide Akisanmi', 
        	'email' => 'admin@chnlsgasplant.com',
        	'phone' => '+234909345698',
        	'password' => bcrypt('admin')
        ]);
  
        //CREATE SUPER ADMIN ROLE AND ASSIGN ALL PERMISSION
        $role = Role::create(['name' => 'Admin']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);
    }
}
