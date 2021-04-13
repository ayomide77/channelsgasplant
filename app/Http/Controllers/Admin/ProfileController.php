<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Hash;
use DB;
use Image;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    
    public function index()
    
    {
                //GET ALL THE AVAILAVLE ROLES
                $roles = Role::all();
                //GET ROLES ASSIGNED TO USER
                $userRoles = \Auth::user()->roles->all();

        return view('admin.profile.index',compact('roles','userRoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
         //GET ALL THE AVAILAVLE ROLES
         $roles = Role::all();
         //GET ROLES ASSIGNED TO USER
         $userRoles = \Auth::user()->roles->all();

 return view('admin.profile.edit',compact('roles','userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       
    
            //VALIDATE INPUT FIELDS
            $this->validate($request, [
                'name' => 'sometimes|required',
                'email' => 'sometimes|required|email',
                'phone' => 'sometimes|required',
                'password' => 'required|confirmed',
                'city' => 'nullable',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'state' => 'nullable',
                'country' => 'nullable',
                'address' => 'nullable',
                'roles' => 'required'
            ]);
    
            
              //FIND USER WITH ID FROM URL
                $user = User::where('id',\Auth::user()->id)->first();

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
                $user->password = Hash::make($request->password);
                $user->city = $request->city;
                $user->state = $request->state;
                $user->address = $request->address;
                $user->country = $request->country;
                $user->image = $profileImage;

                }else{
                   
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->phone = $request->phone;
                    $user->password = Hash::make($request->password);
                    $user->city = $request->city;
                    $user->state = $request->state;
                    $user->address = $request->address;
                    $user->country = $request->country;
                }
                // dd(Hash::make($request->password));
    
                if($user->save()){
                //DELTE USER PREVIOUS ROLES
                DB::table('model_has_roles')->where('model_id',\Auth::user()->id)->delete();
    
                //ASSIGN NEW ROLE/RE-ASSIGN OLD ROLES
                $user->assignRole($request->input('roles'));
    
                //REDIRECT USER BACK WITH SUCCESS MESSAGE
                return redirect()->back()->with('success','Profile updated successfully');
                }
    
                  //REDIRECT USER BACK WITH ERROR MESSAGE
                  return redirect()->back()->with('error','An Error please try again');
    }
}
