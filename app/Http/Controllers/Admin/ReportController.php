<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Order;

class ReportController extends Controller
{
    

    // RETURN REPORT VIEW PAGE
    public function index(){
    
        $soldProducts = Order::distinct()->select('*')->where('status', '=', 1)->groupBy('product_id')->get();

        return view('admin.report.index',compact('soldProducts'));
    }


    //GET PRODUCT REPORT BASED ON PRODUCTS SOLD
public function productReports(Request $request){

    $request->validate([
    'prodId'=>'required',
    ]
    );

    $productReports = Order::where('product_id',$request->prodId)->where('status',1)->get();

    // dd($orders);
    return view('admin.report.productReport',compact('productReports'));
}

// FUNCTION TO GET SALES REPORT USING DATE PICKER
public function salesReport(Request $request){

    $request->validate([
    'startDate'=>'required',
    'endDate'=>'required'
    ]
    );
    //PARSE DATE USING LARAVEL CARBON
    $startDate = new Carbon($request->startDate);
    $endDate = new Carbon($request->endDate);

    // CHECK IF DATES ARE EQUAL AND QUERY WITH SINGLE DATE
    $result = $startDate->eq($endDate);

    if($result){

    $salesReport = Order::where('status',1)->whereDate('updated_at',$startDate)->get();

    }else{

    $salesReport = Order::where('status',1)->whereBetween('updated_at', [$startDate, $endDate])->get();
    }

    return view('admin.report.salesReport',compact('salesReport'));
}


}
