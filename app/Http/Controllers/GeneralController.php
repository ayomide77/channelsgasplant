<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;
use App\Testimonial;
class GeneralController extends Controller
{


// HOME URL GET METHOD
public function index(){

    $testimonials = Testimonial::where('status',1)->get();
    return view('index',compact('testimonials'));
}

// ABOUT US URL METHOD
public function about(){
    return view('about');
}


// PRODUCTS URL GET METHOD
public function products(){
    $products = Product::where('status','1')->get();
    return view('products',compact('products'));
}


// SINGLE PRODUCT URL GET METHOD
public function show($slug){
    $product = Product::where('slug', $slug)->first();
    // dd($product);
    if($product):
    return view('product',compact('product'));

    else:
    return  redirect()->back()->with('error','Invalid route');
    endif;
    }

}
