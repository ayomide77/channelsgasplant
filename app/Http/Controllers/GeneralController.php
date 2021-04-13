<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;

class GeneralController extends Controller
{


// HOME URL GET FUNCTION
public function index(){

    return view('index');
}

// ABOUT US URL FUNCTION
public function about(){
    return view('about');
}

// CONTACT US URL GET FUNCTION
public function contact(){
    return view('contact');
}

// PRODUCTS URL GET FUNCTION
public function products(){
    $products = Product::where('status','1')->get();
    return view('products',compact('products'));
}


// SINGLE PRODUCT URL GET FUNCTION
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
