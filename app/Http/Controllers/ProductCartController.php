<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Product;
use App\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailReceipt;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductCartController extends Controller
{

// return cart view
public function index()
{
    return view('cart');
}


// create cart
public function create()
{
$quantity = request('quantity');
    if ($quantity<1){

    abort(400);

    }

    $product = Product::find(request('id'));

    $cartItem = Cart::add($product->id, $product->name, $quantity, $product->price, [
    'slug' => $product->slug,'image'=>$product->image,'description'=>$product->description,'size'=>$product->size]);

    return response()->json(['cartCount' => Cart::count()]);
}


//PRODUCT CART CHECKOUT FUNCTION
public function cartCheckout()
{

    // CHECK IF USER IS LOGGED IN
    if (!Auth::check()) {

    return redirect()->route('login')->with('error','Please login or create account to continue');

    } else {

    if (Cart::content()->count() == 0) {return redirect()->route('products');
    }

    }

    return view('customer.checkout');
}



// COMPLETE CHECKOUT
public function completeOrder(Request $request){

    //VALIDATION
    $validator = \Validator::make($request->all(), [
    'address'     => 'required',
    'city'     => 'required',
    'country'  => 'required'
    ]);


    // FIND PRODUCT ORDERED
    $product = Product::where('name' , '=',$request['product_name'] )->first();


    // GENERATE A SINGLE ORDER NUMBER AND TIE IT TO MULTIPLE ORDERS
    $order_no = mt_rand(0,123456);

    // CHECK THE CART SEESION ITEM AND LOOP INOT DATABASE
    foreach(Cart::content() as $productCart){
    $order =  new Order();
    $order->order_no = $order_no;
    $order->user_id =  Auth::user()->id;
    $order->address =  $request['address'];
    $order->city =  $request['city'];
    $order->country =  $request['country'];
    $order->product_id =  $productCart->id;
    $order->qty =  $productCart->qty;

    //SAVE ORDER
    $order->save();
    }

    //CLEAR CART
    Cart::destroy();

    // FIND USER AND UPDATE INFORMATION 
    $user = User::find(Auth::user()->id);

    $user->address = $request->address;
    $user->state = $request->state;
    $user->city = $request->city;
    $user->email = $request->email;
    $user->country = $request->country;
    $user->save();

    //return to dashboard
    // Mail::send('mails.sendMailReceipt', ['name'=>\Auth::user()->name], function ($message) {
    //     $message->sender('admin@chnlsgasplant.com', 'CGP');
    //     $message->from('admin@chnlsgasplant.com', 'John Doe');
    //     $message->sender('admin@chnlsgasplant.com', 'John Doe');
    //     $message->to(\Auth::user()->email, \Auth::user()->name);
       
    // });

    

    // $data = [
    //     'message' => 'Order Recieved',
    //     'name'=>\Auth::user()->name,
    //     'email'=>\Auth::user()->email,
    //     'orderno'=>$order->order_no];

    // Mail::to($request->email)->send(new SendEmailReceipt($data));

    return redirect()->route('home')->with('success','Your order has been received, our dispatch will be at your location shortly.');
}


public function update($cartid)
{
   
    // Cart::update($cartId, request('quantity'));

    return response()->json(['code' => $cartId]);

}


//REMOVE SINGLE CART ITEM
public function removeCart($cartId)
{
    Cart::remove($cartId);
    return response()->json(['success' => true]);
}

// DELETE / DESTROY ALL CART ITEMS
public function destroy(ProductCart $productCart)
{
    Cart::destroy();

    return redirect()->route('cart')->with('success','Your cart has been cleard');
}
}
