<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class ProductController extends Controller
{ 
    
// PRODUCTS URL GET METHOD
public function index(){
    $products = Product::where('status','1')->get();
    return view('products',compact('products'));
}



// SINGLE PRODUCT URL GET METHOD
public function show($slug){
    $product = Product::where('slug', $slug)->first();
    // dd($product);
    return view('product',compact('product'));
    
    }

}