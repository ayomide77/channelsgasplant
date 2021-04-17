<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactusEmail;

class ContactController extends Controller
{
    // GET CONTACT METHOD
    public function index() {
       return view('contact');
    }

  // <-- POST METHOD FOR TESTIMONIAL FORM --->
      public function send(Request $request){

      // VALIDATE USER INPUT
      $request->validate([
      'name' => 'required|max:255',
      'email' => 'required|max:255',
      'message' => 'required',
      ]
      );

      $data = [
          'name'=>$request->name,
          'email'=>$request->email,
          'message'=>$request->message
      ];

    //    Mail::to($email)->send(new ContactusEmail($name,$email,$message));
     Mail::to('info@chnlsgasplant.com')->send(new ContactusEmail($data));

    //RETURN TO PREVIOUS PAGE WITH SUCCESS MESSAGE

       return back()->with('success','Thank you for contacting us .. we will get back to you if need be.');

      }
}
