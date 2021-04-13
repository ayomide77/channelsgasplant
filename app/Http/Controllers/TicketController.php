<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Order;
use Illuminate\Http\Request;

class TicketController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
//GET PENDING ORDERS FILTER BY USER
$orders =  Order::select('*')
->where([
['user_id', '=', \Auth::user()->id],
['status', '=', false]
])->get();

// QUERY USER TICKET
$tickets = Ticket::where('user_id',\Auth::user()->id)->get();

return view('customer.ticket.index',compact('orders','tickets'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
//
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
    //validate the field
    $request->validate([
    'dpt' => 'required|max:255',
    'subject' => 'required|max:255',
    'message' => 'required',
    'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);




    $user = auth()->user();
    $ticket = new Ticket();


    if($request->file != null){

    $fileName = time().'.'.$request->file->extension();  

    $request->file->move(public_path('/chnlsgasplant/images/ticket'), $fileName);


    $ticket->user_id = $user->id;
    $ticket->department = request('dpt');
    $ticket->ticket_ref = '#'.rand(0,123456);
    $ticket->subject = request('subject');
    $ticket->message = request('message');
    $ticket->file = $fileName;

    }



    $ticket->user_id = $user->id;
    $ticket->department = request('dpt');
    $ticket->ticket_ref = '#'.rand(0,123456);
    $ticket->subject = request('subject');
    $ticket->message = request('message');

    if($ticket->save()){
    return  redirect()->back()->with('success','Ticket Created Successfully');
    }

    return redirect()->back()->withErrors($validator)->withInput();

}


public function show(Ticket $ticket)
{
//
}


}
