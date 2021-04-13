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
    $orders = Order::where('status',0)->get();
    $totalOrders = Order::all();
    $totalUsers = User::all();
    $totalSales = Order::where('status',1)->get();


    //GET TODAY COMPLETE ORDERS , BY CHAINING QUERIES
    $currentSales = Order::where('status','=',1)->whereDate('updated_at', Carbon::today())->paginate(10);

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
