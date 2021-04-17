<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class TestimonialController extends Controller
{
    
// <---- GET METOHD FOR TESTIMONIAL PAGE  --->>
public function index()
{
    //RETURN VIEW
    return view('testimonial');
}


// <-- POST METHOD FOR TESTIMONIAL FORM --->
public function store(Request $request){

    // VALIDATE USER INPUT
    $request->validate([
    'name' => 'required|max:255',
    'occupation' => 'required|max:255',
    'message' => 'required',
    ]
    );

    // INSTANTIATE OUR MODEL FOR DATA STORAGE
    $testimonial = new Testimonial();
    $testimonial->fullname = $request->name;
    $testimonial->occupation = $request->occupation;
    $testimonial->details = $request->message;

    //RETURN TO PREVIOUS PAGE WITH SUCCESS MESSAGE
    if($testimonial->save()){

    return back()->with('success','Thank you for your time, your testimonial has been received.');
    }

    //RETURN TO PREVIOUS PAGE WITH ERRROR MESSAGE

    return back()->with('error','Opps .. something went wrong, please try again.');

}

}
