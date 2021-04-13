<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    function __construct()
    {
         $this->middleware('role:Admin');

    }
    
// RETURN ALL USERS WITH THE ROLE OF STAFF USING FUNCTION QUERY
    public function index()
    {
            $staffRoles = ['Admin','Sales'];
            $data = User::whereHas('roles', static function ($query) use ($staffRoles) {
            return $query->whereIn('name', $staffRoles);
            })->get();
         return view('admin.staff.index',compact('data'));
    }
}
