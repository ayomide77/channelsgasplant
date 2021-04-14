<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailReceipt;
use App\Order;
use App\User;


class EmailController extends Controller
{
    

     public function sendReceipt($receiptno,$userid)
     {

        // GET ALL COMPLETED ORDERS WHERE THE RECEIPTS NO MATCH

        $data = Order::where([
        ['status', '=', true],
        ['receipt_no', '=', $receiptno]
        ])->get();

        $user = User::where('id',$userid)->first();

        Mail::to($user->email)->send(new SendEmailReceipt($data,$receiptno));

        return redirect()->back()->with('success','Receipt has been sent');
     }
}
