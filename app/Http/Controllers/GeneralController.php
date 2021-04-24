<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
class GeneralController extends Controller
{


// HOME URL GET METHOD
public function index(){

    $testimonials = Testimonial::where('status',1)->get();
    return view('index',compact('testimonials'));
}

}
