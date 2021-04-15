<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Carbon\Carbon;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    
    public function __construct()
    {
     
        $this->middleware('auth');
    }

    //RETURN ADMIN DASHBOARD VIEW PAGE
    public function index()
    {
        //CHECK IF USER IS ADMIN AND REDIRECT
    if ( \Auth::user()->hasAnyRole(['Admin', 'Sales'])) {


    //GET LATEST ORDERS 
    //GELL ALL ORDERS , COUNT order_no AND RETURN BY GROUPED.
    $orders = Order::select('*', DB::raw('count(order_no) count'))->groupBy('order_no')->where('status',false)->get();
    //GELL ALL ORDERS
    $totalOrders = Order::all();
    //GET ALL USERS
    $totalUsers = User::all();
    //GET ALL COMPLETED ORDERS
    $totalSales = Order::where('status',1)->get();


    //GET TODAY COMPLETE ORDERS , BY CHAINING QUERIES
      //GELL ALL ORDERS , COUNT order_no AND RETURN BY GROUPED.
      $currentSales = Order::select('*',
      DB::raw('count(order_no)count'))
      ->groupBy('order_no')
      ->where('status',true)
      ->whereDate('updated_at', Carbon::today())
      ->get();

    // $currentSales = Order::where('status','=',1)->whereDate('updated_at', Carbon::today())->paginate(10);

    $topSales = DB::table('products')
    ->leftJoin('orders','products.id','=','orders.product_id')
    ->leftJoin('users','orders.staff_id','=','users.id')
    ->selectRaw('products.*')
    ->selectRaw('products.name as product_name')
    ->selectRaw('orders.qty , SUM(orders.qty) qty')
    ->selectRaw('users.name')
    ->groupBy('products.id')->where('orders.status','=',1)
    ->orderBy('qty','desc')->get();

    // dd($topSales);

    return view('admin.dashboard',compact('orders','currentSales','topSales','totalOrders','totalUsers','totalSales'));
    }

    return  redirect()->back();
    }

    
}
