<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use DB;
use Image;
use App\User;
use Hash;

class UserController extends Controller
{

function __construct()
{
$this->middleware('role:Admin');

}

//GET FUNCTION TO DISPLAY NUMBER OF USERS
public function index(Request $request)
{

    //CHAIN FUNCTION TO GET ALL USERS WITH User ROLE IN THE DB
    $data = Role::where('name', 'User')->first()->users()->get();

    //RETURN VIEW AND PASS PARAMETER data TO IT
    return view('admin.users.index',compact('data'));
}


//GET FUNCTION TO CREATE NEW USERS BY ADMIN
public function create()
{
    //FETCH ALL ROLE
    $roles = Role::all();

    //RETURN  VIEW AND PASS roles DATA TO IT
    return view('admin.users.create',compact('roles'));
}


//POST FUNCTION TO STORE INFORMATION FOR NEW USERS
public function store(Request $request)
{
    //VALIDATE INPUT FIELDS
    $this->validate($request, [
    'name' => 'required',
    'email' => 'required|email|unique:users',
    'password' => 'required|same:confirm-password',
    'phone' => 'required|numeric|unique:users',
    'city' => 'nullable',
    'state' => 'nullable',
    'country' => 'nullable',
    'address' => 'nullable',
    'roles' => 'required'
    ]);


    //FIND USER WITH ID FROM URL
    $user = new User;
    //UPDATE USER DETAILS
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->password = Hash::make($request->password);
    $user->city = $request->city;
    $user->state = $request->state;
    $user->address = $request->address;
    $user->country = $request->country;

    if($user->save()){
    //ASSIGN ROLE SPECIFIED BY THE ADMIN WHILE CREATING THE USER
    $user->assignRole($request->input('roles'));

    //RETURN TO PREVIOUS PAGE WITH SUCCESS MESSAGE
    return redirect()->back()->with('success','User created successfully');
    }

    //RETURN TO PREVIOUS PAGE WITH  ERROR  MESSAGE
    return redirect()->back()->with('error','User not created try again');
}


//GET FUNCTION TO SHOW DETAILS OF A SINGLE USER
public function show($id)
{
    //FIND USER WITH ID FROM URL
    $user = User::find($id);

    //GET ALL THE AVAILAVLE ROLES
    $roles = Role::all();
    //GET ROLES ASSIGNED TO USER
    $userRoles = $user->roles->all();


    //RETURN VIEW WITH USER PARAMETERS TO THE VIEW
    return view('admin.users.show',compact('user','roles','userRoles'));
}


//GET FUNCTION TO EDIT USER
public function edit($id)
{
    //FIND USER WITH ID FROM URL
    $user = User::find($id);

    //GET ALL THE AVAILAVLE ROLES
    $roles = Role::all();
    //GET ROLES ASSIGNED TO USER
    $userRoles = $user->roles->all();
    //RETURN VIEW WITH USER PARAMETERS
    return view('admin.users.edit',compact('user','roles','userRoles'));
}





//POST FUNCTION TO UPDATE USER DETAILS
public function update(Request $request, $id)
{

    //VALIDATE INPUT FIELDS
    $this->validate($request, [
    'name' => 'sometimes|required',
    'email' => 'sometimes|required|email',
    'phone' => 'sometimes|required',
    // 'password' => 'sometimes|confirmed',
    'city' => 'nullable',
    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'state' => 'nullable',
    'country' => 'nullable',
    'address' => 'nullable',
    'roles' => 'required'
    ]);


    //FIND USER WITH ID FROM URL
    $user = User::find($id);

    // Check for old profile picture and delete it from location
    if($user->image !== null){
    $file = public_path("/chnlsgasplant/images/user/$user->image"); 
    unlink($file);
    }

    //CHECK IF USER IMAGE INOUT IS NOT NULL AND UPLOAD IMAGE
    if($request->image != null){

    $profileImage = Str::slug($request['name'], '-'). '.' . $request->image->getClientOriginalExtension();

    $destinationPath = public_path('/chnlsgasplant/images/user');

    $resizeImage = Image::make($request->image->getRealPath());

    $resizeImage->resize(150, 150, function($constraint){

    $constraint->aspectRatio();

    })->save($destinationPath . '/' . $profileImage);


    //UPDATE USER DETAILS
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    // $user->password = Hash::make($request->password);
    $user->city = $request->city;
    $user->state = $request->state;
    $user->address = $request->address;
    $user->country = $request->country;
    $user->image = $profileImage;

    }else{

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    // $user->password = Hash::make($request->password);
    $user->city = $request->city;
    $user->state = $request->state;
    $user->address = $request->address;
    $user->country = $request->country;
    }
    // dd(Hash::make($request->password));

    if($user->save()){
    //DELTE USER PREVIOUS ROLES
    DB::table('model_has_roles')->where('model_id',$id)->delete();

    //ASSIGN NEW ROLE/RE-ASSIGN OLD ROLES
    $user->assignRole($request->input('roles'));

    //REDIRECT USER BACK WITH SUCCESS MESSAGE
    return redirect()->back()->with('success','User updated successfully');
    }

    //REDIRECT USER BACK WITH ERROR MESSAGE
    return redirect()->back()->with('error','An Error please try again');

}





public function resetUserpassword(Request $request, $id)
{

    //VALIDATE INPUT FIELDS
    $this->validate($request, [
    'password' => 'required|confirmed',

    ]);

    $user = User::find($id);
    $user->password = Hash::make($request->password);

    if( $user->save()){
    //REDIRECT USER BACK WITH SUCCESS MESSAGE
    return redirect()->back()->with('success','User password updated successfully');
    }
    //REDIRECT USER BACK WITH SUCCESS MESSAGE
    return redirect()->back()->with('success','Error Please tr again');

}


//POST FUNCTION TO DELETE USER
public function destroy($id)
{

        $user = User::where('id',$id)->first();

        // CHECK IF USER IS A SUPER ADMIN AND REDIRECT WITH ERROR
        if($user->hasrole('Admin')){
        return redirect()->back()->with('error','Super Admin Cannot Be Deleted');
        }
        // REMOVE USE ROLE WITH THE CACHE
        $user->roles()->detach();
        $user->forgetCachedPermissions();
        // DELETE USER AND REDIRECT BACK
        $user->delete();
        return redirect()->back()->with('success','User deleted successfully');
}


}