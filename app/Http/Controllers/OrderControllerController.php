<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderControllerController extends Controller
{
    

     //CUSTOMER ORDER 
    public function index()
    {
        //GET ALL ORDERS FOR THIS USER
        $orders =  Order::where('user_id', '=', \Auth::user()->id)->get();
        return view('customer.orders',compact('orders'));
    }

   
}
