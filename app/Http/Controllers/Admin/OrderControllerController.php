<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Order;
use App\User;
use DB;

class OrderControllerController extends Controller
{


    // METHOD TO RETURN ALL ORDERS
    public function listOrders()
    {
        //GET ALL ORDERS 
        $orders =  Order::orderBy("id","desc")->get();
        return view('admin.orders.index',compact('orders'));
        }

        // METHOD TO GET ALL COMPLETED ORDERS
    public function completedOrders()
    {
        //GET ALL COMPLETED ORDERS
        $orders =  Order::where('status', 1)->orderBy("id","desc")->get();
        return view('admin.orders.completeOrders',compact('orders'));
    }


    // METHOD TO GET ALL PENDING ORDERS
    public function pendingOrders()
    {
        //GET ALL PENDING ORDERS 
        $orders =  Order::where('status', 0)->orderBy("id","desc")->get();
        return view('admin.orders.pendingOrders',compact('orders'));
    }



    // the update order function serves as comfirming orders my staff.
    public function update(Request $request)
    {
        $staffId = \Auth::user()->id;
        // $receipt_no = 'cgp'.mt_rand(0,12345);
          $random = Str::random(10,5);
        $receipt_no = strtolower($random);
        $order = Order::where('order_no',$request->orderno)->update(array('status'=>1,'staff_id'=>$staffId,'receipt_no'=>$receipt_no,'updated_at'=>now()));

        if($order){
        return response()->json(['code'=>200]);
        }else{
        return response()->json(['code'=>400]);
        }

    }

        // METHOD TO GET ALL SALES BY PULLING COMPLETED ORDERS
        public function sales(){

            //GET ALL COMPLETED ORDERS 
            $sales =  Order::where('status', true)->orderBy("id","desc")->get();
            return view('admin.sales.index',compact('sales'));
    }





    // METHOD TO GENERATE INVOICE FOR BUYER
    public function generateInvoice($order_no){

        $user_invoice = Order::where([
        ['status', '=', false],
        ['order_no', '=', $order_no]])->get();

        $user = null;

        if(count($user_invoice)>0){

        $user_id = Order::where([
        ['status', '=', false],
        ['order_no', '=', $order_no]])->first();

        //Get User using user_id from Order Table
        $user = User::where('id',$user_id->user_id)->first();

        }

        //   Generate Random Number For Invoicing
        // $receipt_no  = 'receipt_no'.mt_rand(0,12345);
        return view('admin.invoice.index',compact('user_invoice','user'));
    }






    // METHOD TO GENERATE RECEIPT FOR BUYER
    public function generateReceipt($order_no){

        $user_reciepts = Order::where([
        ['status', '=', true],
        ['order_no', '=', $order_no]
        ])->get();

        //   ASSIGN NULL VALUES TO AVOID ERROR
        $user = null;
        $receipt_date = null;
        $receipt_no = null;

        if(count($user_reciepts)>0){

        $user_order = Order::where([
        ['status', '=', true],
        ['order_no', '=', $order_no]])->first();

        $receipt_date = $user_order->updated_at;
        $receipt_no = $user_order->receipt_no;
        //Get User using user_id from Order Table
        $user = User::where('id',$user_order->user_id)->first();

        }

        return view('admin.reciept.index',compact('user_reciepts','user','receipt_date','receipt_no'));

    }
}
