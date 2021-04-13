<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Ticket;
use App\Product;
use App\User;
use Image;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //REFIRECT TO HOME AFTER AUTHENTICATION
    public function index()
    {
       
            //CHECK IF USER IS ADMIN AND REDIRECT
            if ( \Auth::user()->hasAnyRole(['Admin', 'Sales']) ) {
            return redirect()->route('dashboard');
            }

                 //GET PENDING ORDERS FILTER BY USER
                 $orders =  Order::select('*')
                 ->where([
                 ['user_id', '=', \Auth::user()->id],
                 ['status', '=', false]
                 ])->get();
     
                 // QUERY USER TICKET
                 $tickets = Ticket::where('user_id',\Auth::user()->id)->get();
                 
            return view('customer.dashboard',compact('orders','tickets'));
    }

    //RETURN CREATE TICKET PAGE
    public function createTicket(){

            return view('customer.createTicket');
        }

        //RETURN PROFILE PAGE
    public function profile(){

            return view('customer.profile');
        }

        //RETURN PROFILE PAGE
    public function setting(){

            return view('customer.setting');
        }

        //UPDATE USER DETAILS
    public function updateProfile(Request $request , $id){

          
//    POST FUNCTION TO UPDATE USER PROFILE
       $request->validate([
            'name' => 'required|max:255',
            'phone' => 'nullable|numeric|min:13',
            'email' => 'nullable',
            'address' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'state' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
        ]);

    //   dd($request);


           $user = User::find($request->id);

           // Check for old profile picture and delete it from location
           if($user->image !== null){
            $file = public_path("/chnlsgasplant/images/user/$user->image"); 
            unlink($file);
        }

        if($request->image != null){


            $profileImage = Str::slug($request['name'], '-'). '.' . $request->image->getClientOriginalExtension();

            $destinationPath = public_path('/chnlsgasplant/images/user');

            $resizeImage = Image::make($request->image->getRealPath());

            $resizeImage->resize(150, 150, function($constraint){

            $constraint->aspectRatio();

            })->save($destinationPath . '/' . $profileImage);


            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->country = $request->country;
            $user->image = $profileImage;
        }else{
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->country = $request->country;
            // $user->image = $profileImage;
        }

        
        if($user->save()){
          
            return redirect()->back()->with( 'success', 'Your profile was updated successfully :)');
        }else{
        
            return redirect()->back()->with( 'error', 'Error! Please Try Again');
        }
        }


        //UPDATE USER DETAILS
    public function postSetting(Request $request , $id){

          
//    POST FUNCTION TO UPDATE USER PROFILE
       $request->validate([
            'curpass' => 'required',
            'password' => 'required|confirmed',
        ]);

    //   dd($request);

           $user = User::find($request->id);

           if(Hash::check($request->curpass, $user->password)){
            
            $user->password = Hash::make($request->password);

           }else{
            return redirect()->back()->with( 'error', 'Error! Invalid Password try again');
           }
          
        if($user->save()){
          
            // return redirect()->back()->with( 'success',  'password was updated successfully :)');
            Session::flush(); return redirect()->route('login')->with( 'success',  'success! kindly login with new password');
        }else{
        
            return redirect()->back()->with( 'error', 'Error! Please Try Again');
        }
        }

        // public function logout() { Session::flush(); return redirect()->route('your route'); }
}
