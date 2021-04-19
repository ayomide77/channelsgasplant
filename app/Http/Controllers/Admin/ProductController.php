<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;



class ProductController extends Controller
{

//     public function __construct()
// {
//     $this->middleware(['role:Admin']);
// }

function __construct()
{
    $this->middleware('permission:list product|create product|edit product|delete product', ['only' => ['index','show']]);
    $this->middleware('permission:create product', ['only' => ['create','store']]);
    $this->middleware('permission:edit product', ['only' => ['edit','update']]);
    $this->middleware('permission:delete product', ['only' => ['destroy']]);
}

// FUNCTION TO DISPLAY ALL PRODUCTS
public function index()
{
    $products = Product::where('status',1)->paginate(5);
    return view('admin.products.index',compact('products'));
}


// RETURN ARCHIVED PRODUCT
public function archived()
{
    $products = Product::where('status',0)->paginate(5);
    return view('admin.products.archived',compact('products'));
}


// RETURN PRODUCT CREATE PAGE
public function create()
{
    return view('admin.products.create');
}



// STORE PRODUCT
public function store(Request $request)
{
    // dd($request);
    $request->validate([
    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'name' => 'required|max:255|unique:products',
    'price' => 'required|numeric',
    'size' => 'required|max:255',
    'description' => 'required|max:255',
    'status' => 'required'
    ]);

    $imageName = time().'.'.$request->image->extension();  

    // $request->image->move(public_path('/chnlsgasplant/images/product'), $imageName);

    Image::make($request->image->getRealPath())->resize(670, 600)->save(public_path("/chnlsgasplant/images/product/" . $imageName));

    $product= new Product();
    $product->slug = Str::slug($request['name'], '-');
    $product->name = request('name');
    $product->price = request('price');
    $product->description = request('description');
    $product->size = request('size');
    $product->status = request('status');
    $product->image = $imageName;


    if($product->save()){

    return redirect()->back()->with( 'success', $product->name.' was created successfully :)');
    }else{

    return redirect()->back()->with( 'error', 'Error! Please Try Again');
    }

}


//GET FUNCTION TO SHOW SINGLE PRODUCT
public function show(Product $product)
{
    return view('admin.products.show',compact('product'));
}


//GET FUNCTION TO SHOW PRODUCT EDIT FORM
public function edit(Product $product)
{
    return view('admin.products.edit',compact('product'));
}



// POST FUNCTION TO UPDATE PRODUCT
public function update(Request $request, Product $product)
{
    $request->validate([
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'name' => 'required|max:255',
    'price' => 'required|numeric',
    'size' => 'required|max:255',
    'description' => 'required|max:255',
    'status' => 'required'
    ]);



    if($request->image != null){
        
        $file = public_path("/chnlsgasplant/images/product/$product->image");
        unlink($file);

    $imageName = time().'.'.$request->image->extension();  

    $request->image->move(public_path('/chnlsgasplant/images/product'), $imageName);

    $product->slug = Str::slug($request['name'], '-');
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->size = $request->size;
    $product->status = $request->status;
    $product->image = $imageName;

    }else{

    $product->slug = Str::slug($request['name'], '-');
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->size = $request->size;
    $product->status = $request->status;
    }


    if($product->save()){

    return redirect()->back()->with( 'success', $product->name.' was updated successfully :)');
    }else{

    return redirect()->back()->with( 'error', 'Error! Please Try Again');
    }
}


 
    // public function destroy(Product $product)
    // {
    //     $file = public_path("/chnlsgasplant/images/product/$product->image"); 
    //     unlink($file);
    //     $product->delete();
    //     return redirect()->route('')->with('success','Product deleted successfully');
    // }
}
