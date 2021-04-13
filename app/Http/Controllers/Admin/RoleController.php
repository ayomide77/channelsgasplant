<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use DB;

class RoleController extends Controller
{
function __construct()
{  

//ALLOW ACCESS TO USER WITH THESE PERMISSIONS
$this->middleware('permission:list role|create role|edit role|delete role', ['only' => ['index','store']]);
$this->middleware('permission:create role', ['only' => ['create','store']]);
$this->middleware('permission:edit role', ['only' => ['edit','update']]);
$this->middleware('permission:delete role', ['only' => ['destroy']]);
}


// GET FUNCTION TO RETURN ALL ROLES
public function index(Request $request)
{
    // GET ALL ROLES AND PAGINATE
    $roles = Role::orderBy('id','DESC')->paginate(5);
    return view('admin.roles.index',compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
}


// GET FUNCTION TO RETURN CREAYE ROLE PAGE
public function create()
{
    $permissions = Permission::get();
    return view('admin.roles.create',compact('permissions'));
}


// POST FUNCTION TO STORE ROLES FROM INPUT
public function store(Request $request)
{
    $this->validate($request, [
    'name' => 'required|unique:roles,name',
    'permission' => 'required',
    ]);


    $role = Role::create(['name' => $request->input('name')]);
    $role->syncPermissions($request->input('permission'));


    return redirect()->back()->with('success','Role created successfully');
    }


    // GET FUNCTION TO DISPLAY A SINGLE ROLE WITH ITS PERMISSIONS
public function show($id)
{
    $role = Role::find($id);
    $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
    ->where("role_has_permissions.role_id",$id)->get();
    return view('admin.roles.show',compact('role','rolePermissions'));
}



// GET FUNCTION TO RETURN ROLE EDIT PAGE FOR A SINGLE ROLE
public function edit($id)
{

$role = Role::find($id);
$permissions = Permission::get();
$rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();


return view('admin.roles.edit',compact('role','permissions','rolePermissions'));
}


// POST FUNCTION TO UPDATE A ROLE
public function update(Request $request, $id)
{
    $this->validate($request, [
    'name' => 'required',
    'permission' => 'required',
    ]);

    $role = Role::find($id);
    $role->name = $request->input('name');
    $role->save();
    $role->syncPermissions($request->input('permission'));
    return redirect()->back()->with('success','Role updated successfully');
}


// POST FUNCTION TO DESTROY / DELETE A ROLE WITH ITS RELATED PERMISSIONS
public function destroy($id)
{
    DB::table("roles")->where('id',$id)->delete();
    return redirect()->back()->with('success','Role deleted successfully');
}
}
