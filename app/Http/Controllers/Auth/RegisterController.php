<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RegisterController extends Controller
{
/*
|--------------------------------------------------------------------------
| Register Controller
|--------------------------------------------------------------------------
|
| This controller handles the registration of new users as well as their
| validation and creation. By default this controller uses a trait to
| provide this functionality without requiring any additional code.
|
*/

use RegistersUsers;


protected $redirectTo = '/home';


    public function __construct()
    {
    $this->middleware('guest');

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'phone' => ['required', 'string', 'numeric', 'min:11', 'unique:users'],
        'password' => ['required', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
            $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            ]);

            //CHECK FOR USER ROLE
            $role = Role::findByName('User');
            //ASSIGN ROLE TO USER
            $user->assignRole([$role->id]);

            return $user;

    }
}
